<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PenjualanGrowthChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Penjualan Produk';

    protected function getData(): array
    {
        // Fetch sales data from the database, grouped by month and product
        $salesData = DB::table('sales')
            ->select(
                DB::raw('DATE_FORMAT(sale_date, "%Y-%m") as month'),
                'produk_id', // Assuming you have a product_id column
                DB::raw('SUM(quantity) as total_sales')
            )
            ->groupBy('month', 'produk_id')
            ->orderBy('month')
            ->get();

        // Prepare data for the chart
        $labels = $salesData->pluck('month')->toArray();
        $produks = $salesData->pluck('produk_id')->unique()->toArray(); // Get unique product IDs

        // Prepare data for each product
        $data = [];
        foreach ($produks as $produk) {
            $data[$produk] = $salesData->where('produk_id', $produk)->pluck('total_sales')->toArray();
        }

        return [
            'labels' => $labels,
            'datasets' => array_map(function($produk) use ($data) {
                return [
                    'label' => $produk, // Use the actual product name
                    'data' => $data[$produk],
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)', // Merah
                        'rgba(54, 162, 235, 0.2)', // Biru
                        'rgba(255, 206, 86, 0.2)', // Kuning
                        'rgba(75, 192, 192, 0.2)', // Hijau
                        'rgba(153, 102, 255, 0.2)', // Ungu
                    ],                    'borderColor' => 'rgba(75, 192, 192, 1)', // Border color
                    'borderWidth' => 1,
                ];
            }, $produks),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Keep as 'bar' for bar chart
    }
}
