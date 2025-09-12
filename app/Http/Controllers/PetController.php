<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
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
        ]);

        $pet->update($data);
        return redirect(route('admin.pets.index'))->with('success', 'Pet updated successfully.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect(route('admin.pets.index'))->with('success', 'Pet deleted successfully.');
    }
}
