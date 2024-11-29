<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class SalesReportPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Laporan Penjualan';
    protected static ?string $navigationGroup = 'Reports';
    protected static string $view = 'reports.sales_by_produk';

    public $salesData;

    public function mount()
    {
        $this->salesData = DB::table('produks')
            ->join('transaction_details', 'produks.id', '=', 'transaction_details.produk_id')
            ->join('transaction', 'transaction.id', '=', 'transaction_details.transaction_id')
            ->join('kategori', 'kategori.id', '=', 'produks.kategori_id')
            ->select(
                'produks.nama as produk_nama',
                'kategori.nama as kategori_nama',
                DB::raw('COUNT(transaction_details.id) as total_sales'),
                DB::raw('SUM(transaction_details.stock) as total_quantity'),
                DB::raw('SUM(transaction_details.stock * transaction_details.harga) as total_revenue')
            )
            ->groupBy('produks.id', 'produks.nama', 'kategori.id', 'kategori.nama')
            ->get();
    }
}