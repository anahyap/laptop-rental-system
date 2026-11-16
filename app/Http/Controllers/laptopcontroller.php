<?php

namespace App\Http\Controllers;

use App\Models\laptop;
use Illuminate\Http\Request;

class laptopcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = laptop::all();

        return view('laptops.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laptops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'serial_number' => 'required|string',
            'daily_rate' => 'required|float',
            'is_available' => 'required|boolean',
        ]);

        laptop::create($validated);

        return redirect()->route('laptops.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(laptop $laptop)
    {
        return view('laptops.show', compact('laptop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(laptop $laptop)
    {
        return view('laptops.edit', compact('laptop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, laptop $laptop)
    {
        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'serial_number' => 'required|string',
            'daily_rate' => 'required|numeric',
            'is_available' => 'required|boolean',
        ]);

        $laptop->update($validated);

        return redirect()->route('laptops.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(laptop $laptop)
    {
        $laptop->delete();

        return redirect()->route('laptops.index');
    }
}