<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF; // Ensure you have the PDF facade imported
use App\Models\Produk; // Adjust according to your model structure

class ReportController extends Controller
{
    // Laporan Penjualan per Produk
    public function reportSalesByProduk()
    {
        $salesData = DB::table('produks')
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
    
        return view('reports.sales_by_produk', compact('salesData'));
    }

    // Generate PDF for Sales by Product
    public function generateSalesByProdukPdf()
    {
        $salesData = DB::table('produks')
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
    
        $pdf = PDF::loadView('reports.sales_by_produk_pdf', compact('salesData'));
        return $pdf->download('sales_by_produk_report.pdf');
    }

    // Laporan Kategori Terlaris
    public function reportTopCategories()
    {
        $topCategories = DB::table('kategori')
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
    
        return view('reports.top_categories', compact('topCategories'));
    }

    public function generateTopCategoriesPdf()
    {
        $topCategories = DB::table('kategori')
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
    
        $pdf = PDF::loadView('reports.top_categories_pdf', compact('topCategories'));
        return $pdf->download('top_categories_report.pdf');
    }

    public function stokProdukByKategori()
    {
        $stokProdukKategori = DB::table('produks')
            ->join('kategori', 'produks.kategori_id', '=', 'kategori.id')
            ->select(
                'kategori.nama', 
                DB::raw('COUNT(produks.id) as total_produk'),
                DB::raw('SUM(produks.stock) as total_stock')
            )
            ->groupBy('kategori.nama')
            ->get();
    
        return view('reports.stok_produk_kategori', compact('stokProdukKategori'));
    }
    
    public function generatePdfStokProdukByKategori()
    {
        $stokProdukKategori = DB::table('produks')
            ->join('kategori', 'produks.kategori_id', '=', 'kategori.id')
            ->select(
                'kategori.nama',
                DB::raw('COUNT(produks.id) as total_produk'),
                DB::raw('SUM(produks.stock) as total_stock')
            )
            ->groupBy('kategori.nama')
            ->get();
    
        $pdf = PDF::loadView('reports.stok_produk_kategori_pdf', compact('stokProdukKategori'));
        return $pdf->download('stok_produk_kategori_report.pdf');
    }
}