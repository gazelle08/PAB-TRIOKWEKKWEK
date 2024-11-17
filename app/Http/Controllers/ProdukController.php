<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        return view('produk.index', compact('produks'));
    }

    /**
     * Menampilkan formulir untuk menambahkan produk baru.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    /**
     * Menyimpan produk baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'berat' => 'required|numeric',
            'stock' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail produk berdasarkan ID.
     */
    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    /**
     * Menampilkan formulir untuk mengedit produk yang sudah ada.
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Memperbarui informasi produk yang sudah ada.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'berat' => 'required|numeric',
            'stock' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
