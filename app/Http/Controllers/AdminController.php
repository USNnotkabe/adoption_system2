<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\UserController;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard
     */
   public function index()
{
    $totalPets = Pet::count();
    $totalUsers = User::count();
    $availablePets = Pet::where('adoption_status', 'available')->count();
    $adoptedPets = Pet::where('adoption_status', 'adopted')->count();
    $pendingAdoptions = Pet::where('adoption_status', 'pending')->count();

    return view('admin.admin', compact(
        'totalPets',
        'totalUsers',
        'availablePets',
        'adoptedPets',
        'pendingAdoptions'
    ));


    }


    public function users()
    {
        $users = User::withCount([
            // Uncomment these lines when you create the Adoption model
            'adoptionRequests',
            'adoptionRequests as approved_adoptions_count' => function ($query) {
                $query->where('status', 'approved');
            },
            'adoptionRequests as pending_adoptions_count' => function ($query) {
                $query->where('status', 'pending');
            }
        ])->paginate(15);
        if (request()->expectsJson()) {
            return response()->json($users);
        }
        return view('users.index', compact('users'));
    }


    public function showUser(User $user)
    {
        $currentPets = Pet::where('user_id', $user->id)->get();
        $currentPets = collect([]);

        // Get user's adoption history (when you create Adoption model)
        $adoptions = $user->adoptionRequests()->with('pet')->orderBy('created_at', 'desc')->paginate(10);

        $adoptions = collect([]);
        return view('users.index', compact('user', 'currentPets', 'adoptions'));
    }




    public function deleteUser(User $user)
    {
        try {
            // Don't allow deleting users who have adopted pets (if using user_id in pets)
            $adoptedPetsCount = Pet::where('user_id', $user->id)->count();
            if ($adoptedPetsCount > 0) {
                if (request()->expectsJson()) {
                    return response()->json(['error' => 'Cannot delete user who has adopted pets'], 400);
                }
                return back()->with('error', 'Cannot delete user who has adopted pets. Please transfer pets first.');
            }

            // Delete user's adoption requests first (when you have Adoption model)
            $user->adoptionRequests()->delete();

            // Delete the user
            $user->delete();

            if (request()->expectsJson()) {
                return response()->json(['message' => 'User deleted successfully']);
            }

            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            if (request()->expectsJson()) {
                return response()->json(['error' => 'Failed to delete user'], 500);
            }

            return back()->with('error', 'Failed to delete user');
        }
    }


}