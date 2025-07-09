<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Mahasiswa::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
    'nama' => 'required|string|max:255',
    'nim' => 'required|string|max:20|unique:mahasiswas',
    ]);
    $mahasiswa = Mahasiswa::create($validated);
    return response()->json($mahasiswa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $mahasiswa = Mahasiswa::findOrFail($id);
    return response()->json($mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $mahasiswa = Mahasiswa::findOrFail($id);
    $validated = $request->validate([
    'nama' => 'required|string|max:255',
    'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $id,
    ]);
    $mahasiswa->update($validated);
    return response()->json($mahasiswa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $mahasiswa = Mahasiswa::findOrFail($id);
    $mahasiswa->delete();
    return response()->json(null, 204);
    }
}
