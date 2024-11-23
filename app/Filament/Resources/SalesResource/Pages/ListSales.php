<?php

namespace App\Filament\Resources\SalesResource\Pages;

use App\Filament\Resources\SalesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListSales extends ListRecords
{
 protected static string $resource = SalesResource::class;
 protected function getActions(): array
 {
 return [
 Actions\CreateAction::make(), // Tombol New
 Actions\Action::make('cetak_laporan')
 ->label('Cetak Laporan')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakLaporan())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Sales')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
 ];
 }
 public static function cetakLaporan()
 {
 // Ambil data pengguna
 $data = \App\Models\Sales::all();
 // Load view untuk cetak PDF
 $pdf = \PDF::loadView('laporan.sales', ['data' => $data]);
 // Unduh file PDF
 return response()->streamDownload(fn() => print($pdf->output()), 'laporansales.pdf');
 }
}