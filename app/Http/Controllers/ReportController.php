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
        $salesData = DB::table('produk')
            ->join('transaction_details', 'produk.id', '=', 'transaction_details.produkid')
            ->join('transaction', 'transaction.id', '=', 'transaction_details.transactionid')
            ->join('kategori', 'kategori.id', '=', 'produk.kategori_id')
            ->select(
                'produk.nama as produk_nama',
                'kategori.nama as kategori_nama',
                DB::raw('COUNT(transaction_details.id) as total_sales'),
                DB::raw('SUM(transaction_details.stock) as total_quantity'),
                DB::raw('SUM(transaction_details.stock * transaction_details.harga) as total_revenue')
            )
            ->groupBy('produk.id', 'produk.nama', 'kategori.id', 'kategori.nama')
            ->get();
    
        return view('reports.sales_by_produk', compact('salesData'));
    }
       // Generate PDF for Sales by Product
       public function generateSalesByProdukPdf()
       {
           $salesData = DB::table('produk')
               ->join('transaction_details', 'produk.id', '=', 'transaction_details.produkid')
               ->join('transaction', 'transaction.id', '=', 'transaction_details.transactionid')
               ->join('kategori', 'kategori.id', '=', 'produk.kategori_id')
               ->select(
                   'produk.nama as produk_nama',
                   'kategori.nama as kategori_nama',
                   DB::raw('COUNT(transaction_details.id) as total_sales'),
                   DB::raw('SUM(transaction_details.stock) as total_quantity'),
                   DB::raw('SUM(transaction_details.stock * transaction_details.harga) as total_revenue')
               )
               ->groupBy('produk.id', 'produk.nama', 'kategori.id', 'kategori.nama')
               ->get();
       
           $pdf = PDF::loadView('reports.sales_by_produk_pdf', compact('salesData'));
           return $pdf->download('sales_by_produk_report.pdf');
       }

    // Laporan Kategori Terlaris
    public function reportTopCategories()
    {
        $topCategories = DB::table('kategori')
            ->join('produk', 'kategori.id', '=', 'produk.kategori_id')
            ->join('transaction_details', 'produk.id', '=', 'transaction_details.produkid')
            ->select(
                'kategori.nama as kategori_nama',
                DB::raw('SUM(transaction_details.stock) as total_quantity_sold'),
                DB::raw('COUNT(transaction_details.produkid) as total_products_sold'),
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
            ->join('produk', 'kategori.id', '=', 'produk.kategori_id')
            ->join('transaction_details', 'produk.id', '=', 'transaction_details.produkid')
            ->select(
                'kategori.nama as kategori_nama',
                DB::raw('SUM(transaction_details.stock) as total_quantity_sold'),
                DB::raw('COUNT(transaction_details.produkid) as total_products_sold'),
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
        $stokProdukKategori = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select(
                'kategori.nama', 
                DB::raw('COUNT(produk.id) as total_produk'),
                DB::raw('SUM(produk.stock) as total_stock')
            )
            ->groupBy('kategori.nama')
            ->get();
    
        return view('reports.stok_produk_kategori', compact('stokProdukKategori'));
    }
    
    public function generatePdfStokProdukByKategori()
    {
        $stokProdukKategori = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select(
                'kategori.nama',
                DB::raw('COUNT(produk.id) as total_produk'),
                DB::raw('SUM(produk.stock) as total_stock')
            )
            ->groupBy('kategori.nama')
            ->get();
    
        $pdf = PDF::loadView('reports.stok_produk_kategori_pdf', compact('stokProdukKategori'));
        return $pdf->download('stok_produk_kategori_report.pdf');
    }
}    
    