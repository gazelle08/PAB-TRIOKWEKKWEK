<?php

namespace App\Filament\Widgets;

use App\Models\Kategori; // Import the Kategori model
use Filament\Widgets\ChartWidget;

class KategoriGrowthChart extends ChartWidget
{
    protected static ?string $heading = 'Kategori';

    protected function getData(): array
    {
        // Fetch categories and their growth data
        $categories = Kategori::all();
        
        // Example growth data; replace this with your actual logic to get growth values
        $growthData = [10, 20, 30, 25, 40]; // Replace with actual growth data logic

        return [
            'labels' => $categories->pluck('nama')->toArray(), // Get category names for labels
            'datasets' => [
                [
                    'label' => 'Growth', // Dataset label
                    'data' => $growthData, // Y-axis data points
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)', // Merah
                        'rgba(54, 162, 235, 0.2)', // Biru
                        'rgba(255, 206, 86, 0.2)', // Kuning
                        'rgba(75, 192, 192, 0.2)', // Hijau
                        'rgba(153, 102, 255, 0.2)', // Ungu
                    ],
                    'borderColor' => 'rgba(75, 192, 192, 1)', // Border color
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // Chart type
    }
}
