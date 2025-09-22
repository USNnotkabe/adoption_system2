<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Pet;
    use App\Models\User;

    class PetController extends Controller
    {
        public function index()
        {
            $pets = Pet::all(); // This fetches ALL pets from your seeder
            return view('admin.pets.index', ['pets' => $pets]);
        }

        public function create()
        {
            return view('admin.pets.create');
        }

        public function store(Request $request)
        {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'age' => 'required|integer|min:0',
                'breed' => 'nullable|string|max:255',
                'color' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'birth_date' => 'nullable|date|before_or_equal:today',
                'gender' => 'nullable|in:male,female,unknown',
                'allergies' => 'nullable|string|max:255',
                'disabilities' => 'nullable|string|max:255',
                'medication' => 'nullable|string|max:255',
                'food_diet' => 'nullable|string|max:255',
            ]);

            // Automatically set new pets as available
            $data['adoption_status'] = 'available';

            Pet::create($data);
            return redirect(route('admin.pets.index'))->with('success', 'Pet created successfully.');
        }

        public function edit(Pet $pet)
        {
            return view('admin.pets.edit', ['pet' => $pet]);
        }

        public function update(Pet $pet, Request $request)
        {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'age' => 'required|integer|min:0',
                'breed' => 'nullable|string|max:255',
                'color' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'birth_date' => 'nullable|date|before_or_equal:today',
                'gender' => 'nullable|in:male,female,unknown',
                'allergies' => 'nullable|string|max:255',
                'disabilities' => 'nullable|string|max:255',
                'medication' => 'nullable|string|max:255',
                'food_diet' => 'nullable|string|max:255',
                'adoption_status' => 'required|in:available,adopted',
            ]);
            //edited something in here
              $pet->update($data);
            return redirect(route('admin.pets.index'))->with('success', 'Pet created successfully.');
        }
          public function destroy(Pet $pet)
    {
        try {
            $pet->delete();
            return redirect(route('admin.pets.index'))->with('success', 'Pet deleted successfully.');
        } catch (\Exception $e) {
            return redirect(route('admin.pets.index'))->with('error', 'Failed to delete pet. Please try again.');
        }
    }
     public function userPets(User $user){
        $pets = $user->pets()->get();
        if (request()->expectsJson()) {
            return response()->json($pets);
        }   return view('pets.user.pets', compact('user', 'pets'));
    }
     public function show(Pet $pet)
    {
        if (request()->expectsJson()) {
            return response()->json($pet->load('user'));
        }

        return view('pets.show', compact('pet'));
    }

   public function userDashboard()
{
    $pets = Pet::where('adoption_status', 'available')->get();
    return view('dashboard', compact('pets'));
}

    








}


?>