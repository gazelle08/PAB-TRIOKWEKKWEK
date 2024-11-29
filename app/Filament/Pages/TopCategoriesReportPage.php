<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class TopCategoriesReportPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Kategori Terlaris';
    protected static ?string $navigationGroup = 'Reports';
    protected static string $view = 'reports.top_categories';

    public $topCategories;

    public function mount()
    {
        $this->topCategories = DB::table('kategori')
            ->join('produks', 'kategori.id', '=', 'produks.kategori_id')
            ->join('transaction_details', 'produks.id', '=', 'transaction_details.produk_id')
            ->select(
                'kategori.nama as kategori_nama',
                DB::raw('SUM(transaction_details.stock) as total_quantity_sold'),
                DB::raw('COUNT(transaction_details.produk_id) as total_products_sold'),
                DB::raw('SUM(transaction_details.stock * transaction_details.harga) as total_revenue')
            )
            ->groupBy('kategori.id', 'kategori.nama')
            ->orderBy('total_quantity_sold', 'desc')
            ->get();
    }
}