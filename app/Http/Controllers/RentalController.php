<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
{
    $rentals = Rental::with('laptop')
        ->where('user_id', auth()->id())
        ->get();

    return view('rentals.index', compact('rentals'));
}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $laptops = Laptop::where('is_available', true)->get();

    return view('rentals.create', compact('laptops'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'laptop_id' => ['required', 'exists:laptops,id'],
        'start_date' => ['required', 'date', 'after_or_equal:today'],
        'end_date' => ['required', 'date', 'after_or_equal:start_date'],
    ]);

    // Find the selected laptop
    $laptop = Laptop::findOrFail($validated['laptop_id']);

    // Check whether the laptop is available
    if (!$laptop->is_available) {
        return back()
            ->withErrors(['laptop_id' => 'This laptop is unavailable.'])
            ->withInput();
    }

    // Check for overlapping rental dates
    $overlap = Rental::where('laptop_id', $laptop->id)
        ->whereIn('status', ['pending', 'approved', 'active'])
        ->where('start_date', '<=', $validated['end_date'])
        ->where('end_date', '>=', $validated['start_date'])
        ->exists();

    if ($overlap) {
        return back()
            ->withErrors([
                'laptop_id' => 'This laptop is already reserved for those dates.'
            ])
            ->withInput();
    }

    // Save the rental to the database
    Rental::create([
        'user_id' => auth()->id(),
        'laptop_id' => $laptop->id,
        'start_date' => $validated['start_date'],
        'end_date' => $validated['end_date'],
        'status' => 'pending',
    ]);

    return redirect()
        ->route('rentals.index')
        ->with('success', 'Your rental request was submitted successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
{
    if ($rental->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('rentals.edit', compact('rental'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
{
    if ($rental->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $validated = $request->validate([
        'start_date' => ['required', 'date', 'after_or_equal:today'],
        'end_date' => ['required', 'date', 'after_or_equal:start_date'],
    ]);

    $overlap = Rental::where('laptop_id', $rental->laptop_id)
        ->where('id', '!=', $rental->id)
        ->whereIn('status', ['pending', 'approved', 'active'])
        ->where('start_date', '<=', $validated['end_date'])
        ->where('end_date', '>=', $validated['start_date'])
        ->exists();

    if ($overlap) {
        return back()
            ->withErrors([
                'start_date' => 'This laptop is already reserved for those dates.'
            ])
            ->withInput();
    }

    $rental->update($validated);

    return redirect()
        ->route('rentals.index')
        ->with('success', 'Rental updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
{
    if ($rental->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $rental->delete();

    return redirect()
        ->route('rentals.index')
        ->with('success', 'Rental deleted successfully!');
}
}
