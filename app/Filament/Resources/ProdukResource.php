<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Form schema (form untuk create dan edit produk)
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('kategori_id')
                ->label('Kategori')
                ->relationship('kategori', 'nama')
                ->required(),
            Forms\Components\TextInput::make('nama')
                ->label('Nama Produk')
                ->required()
                ->maxLength(500),
            Forms\Components\TextInput::make('berat')
                ->label('Berat (gram)')
                ->required()
                ->numeric(),
            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->required()
                ->maxLength(1000),
            Forms\Components\TextInput::make('stock')
                ->label('Stock')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('harga')
                ->label('Harga (Rp)')
                ->required()
                ->numeric(),
        ]);
    }

    // Tabel untuk menampilkan data produk
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori.nama')
                    ->label('Kategori'),
                Tables\Columns\TextColumn::make('berat')
                    ->label('Berat (gram)'),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Produk'),
                Tables\Columns\TextColumn::make('stock')
                    ->label('Stock'),
                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime(),
            ])
            ->filters([
                // Filter bisa ditambahkan jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    // Relasi yang terkait (jika ada)
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // Halaman yang tersedia
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
