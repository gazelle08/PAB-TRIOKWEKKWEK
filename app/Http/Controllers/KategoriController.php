<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Menambah kategori baru.
     */
    public function addKategori(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:1000',
        ]);

        // Buat kategori baru
        Kategori::create([
            'nama' => $request->nama,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Menghapus kategori berdasarkan ID.
     */
    public function deleteKategori($id)
    {
        // Temukan kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Hapus kategori
        $kategori->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
