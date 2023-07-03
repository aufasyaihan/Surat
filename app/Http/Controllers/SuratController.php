<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Penerima;
use App\Models\Pengirim;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Surat::all();
        return view('dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Surat::all();
        return view('crud.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = Kategori::create([
            'kategori' => $request->kategori
        ]);
        $penerima = Penerima::create([
            'penerima' => $request->penerima
        ]);
        $pengirim = Pengirim::create([
            'pengirim' => $request->pengirim
        ]);
        $surat = Surat::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $kategori->id,
            'penerima_id' => $penerima->id,
            'pengirim_id' => $pengirim->id
        ]);
        return redirect('dashboard')->with('success', 'Surat Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Surat::where('id', $id)->get();
        return view('detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Surat::where('id', $id)->first();
        return view('crud.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Surat::where('id', $id)->delete();
        return redirect()->to('dashboard')->with('success', 'Berhasil Menghapus Surat');
    }
}