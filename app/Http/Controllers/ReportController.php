<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF; // Pastikan untuk mengimpor facade PDF
use App\Models\Produk; // Sesuaikan dengan model Anda

class ReportController extends Controller
{
    // Laporan Penjualan per Produk
    public function reportSalesByProduct()
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
            ->groupBy('produk.id', 'produk.nama', 'kategori.nama')
            ->get();
    
        return view('reports.sales_by_product', compact('salesData'));
    }
    

    // Laporan Transaksi per Pengguna
    public function reportTransactionsByUser()
    {
        $userTransactions = DB::table('users')
            ->join('transaction', 'users.id', '=', 'transaction.userid')
            ->join('transaction_details', 'transaction.transaction_number', '=', 'transaction_details.transactionnumber')
            ->join('produk', 'produk.id', '=', 'transaction_details.produkid')
            ->select(
                'users.usernama',
                DB::raw('COUNT(transaction.id) as total_transactions'),
                DB::raw('SUM(transaction_details.stock) as total_products'),
                DB::raw('SUM(transaction_details.stock * transaction_details.harga) as total_spent')
            )
            ->groupBy('users.id')
            ->get();

        return view('reports.transactions_by_user', compact('userTransactions'));
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
                DB::raw('COUNT(transaction_details.produkid) as total_products_sold')
            )
            ->groupBy('kategori.id')
            ->orderBy('total_quantity_sold', 'desc')
            ->get();
    
        return view('reports.top_categories', compact('topCategories'));
    }

    // Metode untuk mencetak laporan PDF
    public function generatePdf()
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
            ->groupBy('produk.id', 'produk.nama', 'kategori.nama')
            ->get();

        $pdf = PDF::loadView('reports.sales_by_product', compact('salesData'));
        return $pdf->download('laporan_penjualan.pdf');
    }
}
