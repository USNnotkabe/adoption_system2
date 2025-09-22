<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    /**
     * Show adoption form for a specific pet
     */
    public function create(Pet $pet)
    {
        // Check if pet is available
        if (!$pet->isAvailable()) {
            return redirect()->route('pets.show', $pet)
                ->with('error', 'This pet is no longer available for adoption.');
        }

        // Check if user already has a pending request for this pet
        $existingRequest = Adoption::where('user_id', Auth::id())
            ->where('pet_id', $pet->id)
            ->where('status', 'pending')
            ->first();

        if ($existingRequest) {
            return redirect()->route('pets.show', $pet)
                ->with('info', 'You already have a pending adoption request for this pet.');
        }

        return view('adoptions.create', compact('pet'));
    }

    /**
     * Store adoption request
     */
    public function store(Request $request, Pet $pet)
    {
        $request->validate([
            'message' => 'required|string|min:10|max:1000'
        ]);

        // Double-check availability
        if (!$pet->isAvailable()) {
            return redirect()->route('pets.show', $pet)
                ->with('error', 'This pet is no longer available for adoption.');
        }

        // Check for existing pending request
        $existingRequest = Adoption::where('user_id', Auth::id())
            ->where('pet_id', $pet->id)
            ->where('status', 'pending')
            ->first();

        if ($existingRequest) {
            return redirect()->route('pets.show', $pet)
                ->with('info', 'You already have a pending adoption request for this pet.');
        }

        // Create adoption request
        Adoption::create([
            'user_id' => Auth::id(),
            'pet_id' => $pet->id,
            'status' => 'pending',
            'message' => $request->message
        ]);

        // Update pet status to pending
        $pet->update(['adoption_status' => 'pending']);

        return redirect()->route('pets.show', $pet)
            ->with('success', 'Your adoption request has been submitted! We will review it and get back to you soon.');
    }

    /**
     * Show user's adoption requests
     */
    public function myAdoptions()
    {
        $adoptions = Auth::user()->adoptionRequests()->with('pet')->latest()->paginate(10);
        return view('adoptions.my-adoptions', compact('adoptions'));
    }

    /**
     * Cancel adoption request (only if pending)
     */
    public function cancel(Adoption $adoption)
    {
        // Check if user owns this adoption request
        if ($adoption->user_id !== Auth::id()) {
            abort(403);
        }

        if (!$adoption->isPending()) {
            return redirect()->back()
                ->with('error', 'Only pending adoption requests can be cancelled.');
        }

        $pet = $adoption->pet;
        $adoption->delete();

        // If this was the only pending adoption for this pet, set it back to available
        if (!$pet->hasPendingAdoptions()) {
            $pet->update(['adoption_status' => 'available']);
        }

        return redirect()->route('adoptions.my-adoptions')
            ->with('success', 'Adoption request cancelled successfully.');
    }
} 
