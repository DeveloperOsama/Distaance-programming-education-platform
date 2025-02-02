<?php

namespace App\Http\Controllers;

use App\Models\TouristLandmark;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TouristLandmarkController extends Controller
{
    // Display a listing of tourist landmarks
    public function index()
    {
        $landmarks = TouristLandmark::with('governorate')->get();
        return view('admin.tourist-landmarks.index', compact('landmarks'));
    }

    // Show the form for creating a new tourist landmark
    public function create()
    {
        $governorates = Governorate::all();
        return view('admin.tourist-landmarks.create', compact('governorates'));
    }

    // Store a newly created tourist landmark in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'governorate_id' => 'required|exists:governorates,id',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('landmarks', 'public');
        }

        TouristLandmark::create($data);

        return redirect()->route('tourist-landmarks.index')->with('success', 'Tourist landmark created successfully.');
    }

    // Show the form for editing the specified tourist landmark
    public function edit(TouristLandmark $landmark)
    {
        $governorates = Governorate::all();
        return view('admin.tourist-landmarks.edit', compact('landmark', 'governorates'));
    }

    // Update the specified tourist landmark in the database
    public function update(Request $request, TouristLandmark $landmark)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'governorate_id' => 'required|exists:governorates,id',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($landmark->image) {
                Storage::disk('public')->delete($landmark->image);
            }
            $data['image'] = $request->file('image')->store('landmarks', 'public');
        }

        $landmark->update($data);

        return redirect()->route('tourist-landmarks.index')->with('success', 'Tourist landmark updated successfully.');
    }

    // Remove the specified tourist landmark from the database
    public function destroy(TouristLandmark $landmark)
    {
        // Delete associated image if it exists
        if ($landmark->image) {
            Storage::disk('public')->delete($landmark->image);
        }

        $landmark->delete();
        return redirect()->route('tourist-landmarks.index')->with('success', 'Tourist landmark deleted successfully.');
    }
}
