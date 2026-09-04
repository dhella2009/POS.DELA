<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $jenis = Jenis::query()
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jenis,nama',
        ]);

        Jenis::create($request->only('nama'));

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis produk berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jeni)
    {
        return view('jenis.edit', ['jenis' => $jeni]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis $jeni)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jenis,nama,' . $jeni->id,
        ]);

        $jeni->update($request->only('nama'));

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        $jeni->delete();

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis produk berhasil dihapus');
    }
}