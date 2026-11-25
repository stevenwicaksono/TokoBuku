<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index() 
    { 
        $artikels = Artikel::all(); 
        return view('artikel.index', ['artikels' => $artikels]); 
    } 

    public function create() 
    {
        $kategoris = Kategori::all(); 
        return view('artikel.create', ['kategoris' => $kategoris]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required|integer',
            'gambar'      => 'required|image|mimes:jpeg,jpg,png|max:5048',
            'judul'       => 'required|min:5',
            'deskripsi'   => 'required|min:10',
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/artikels', $gambar->hashName());

        Artikel::create([
            'id_kategori' => $request->id_kategori,
            'gambar'      => $gambar->hashName(),
            'judul'       => $request->judul,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect(route('daftarArtikel'));
    }

    public function show(Artikel $artikel)
    {
        //
    }

    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategoris = Kategori::all();
        return view('artikel.edit', compact('artikel', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_kategori' => 'required|integer',
            'gambar'      => 'image|mimes:jpeg,jpg,png|max:5048',
            'judul'       => 'required|min:5',
            'deskripsi'   => 'required|min:10',
        ]);
    
        $artikel = Artikel::findOrFail($id);
    
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/artikels', $gambar->hashName());
            Storage::disk('public')->delete('artikels/' . $artikel->gambar);
    
            $artikel->update([
                'id_kategori' => $request->id_kategori,
                'gambar' => $gambar->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);
        } else {
            $artikel->update([
                'id_kategori' => $request->id_kategori,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);
        }
    
        return redirect()->route('daftarArtikel')->with('success', 'Data Berhasil Diupdate');


    }
    public function destroy(Artikel $artikel)
{
    // Hapus gambar dari storage jika ada
    if ($artikel->gambar && Storage::disk('public')->exists('artikels/' . $artikel->gambar)) {
        Storage::disk('public')->delete('artikels/' . $artikel->gambar);
    }

    $artikel->delete();

    return redirect()->route('daftarArtikel')->with('success', 'Artikel berhasil dihapus.');
}
}