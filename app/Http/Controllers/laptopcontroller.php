<?php

namespace App\Http\Controllers;

use App\Models\LaptopInventory;
use Illuminate\Http\Request;

class laptopcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = LaptopInventory::all();
	$totalCount = LaptopInventory::count();
	$availableCount = LaptopInventory::where('is_available', true)->count();

        return view('laptop.index', compact('items', 'totalCount', 'availableCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laptop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'serial_number' => 'required|string|unique:laptops,serial_number',
            'daily_rate' => 'required|numeric',
            'is_available' => 'required|boolean',
        ]);

        LaptopInventory::create($validated);

        return redirect()->route('laptop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaptopInventory $laptop)
    {
        return view('laptop.show', compact('laptop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaptopInventory $laptop)
    {
        return view('laptop.edit', compact('laptop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaptopInventory $laptop)
    {
        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'serial_number' => 'required|string|unique:laptops,serial_number,' . $laptop->id,
            'daily_rate' => 'required|numeric',
            'is_available' => 'required|boolean',
        ]);

        $laptop->update($validated);

        return redirect()->route('laptop.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaptopInventory $laptop)
    {
        $laptop->delete();

        return redirect()->route('laptop.index');
    }
}