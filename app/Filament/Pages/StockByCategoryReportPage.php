<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class StockByCategoryReportPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Stok Produk per Kategori';
    protected static ?string $navigationGroup = 'Reports';
    protected static string $view = 'reports.stok_produk_kategori';

    public $stokProdukKategori;

    public function mount()
    {
        $this->stokProdukKategori = DB::table('produks')
            ->join('kategori', 'produks.kategori_id', '=', 'kategori.id')
            ->select(
                'kategori.nama', 
                DB::raw('COUNT(produks.id) as total_produk'),
                DB::raw('SUM(produks.stock) as total_stock')
            )
            ->groupBy('kategori.nama')
            ->get();
    }
}