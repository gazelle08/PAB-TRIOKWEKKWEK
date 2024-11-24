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
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Admin Manage';
    protected static ?string $navigationLabel = 'Produk';


    // Form schema (form untuk create dan edit produk)
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('kategori_id')
                ->relationship('kategori', 'nama')
                ->required(),
            Forms\Components\TextInput::make('berat')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('stock')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('harga')
                ->numeric()
                ->required(),
            Forms\Components\FileUpload::make('image')
                ->directory('produk_images')
                ->image()
                ->nullable(),
            Forms\Components\Textarea::make('deskripsi')
                ->maxLength(65535),
        ]);
    }

    // Tabel untuk menampilkan data produk
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('kategori.nama')->label('Kategori')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('berat')->sortable(),
            Tables\Columns\TextColumn::make('stock')->sortable(),
            Tables\Columns\TextColumn::make('harga')->sortable(),
            Tables\Columns\ImageColumn::make('image')->label('Gambar'),
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
