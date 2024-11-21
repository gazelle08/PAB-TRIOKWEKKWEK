<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TransactionsImport;
use Illuminate\Http\Request;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('transaction_number')
                    ->required()
                    ->maxLength(5000),
                Forms\Components\TextInput::make('telepon')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_resi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kurir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kota')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ongkir')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('alamat')
                    ->required(),
                Forms\Components\DateTimePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('bukti_transaksi')
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('transaction_number')->sortable()->searchable(),
                TextColumn::make('telepon')->sortable()->searchable(),
                TextColumn::make('no_resi')->sortable()->searchable(),
                TextColumn::make('kurir')->sortable()->searchable(),
                TextColumn::make('kota')->sortable()->searchable(),
                TextColumn::make('ongkir')->sortable(),
                TextColumn::make('total')->sortable(),
                TextColumn::make('date')->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('Import')
                    ->action(function (Request $request) {
                        $request->validate([
                            'file' => 'required|mimes:xlsx,csv',
                        ]);
                        Excel::import(new TransactionsImport, $request->file('file'));
                        return redirect()->back()->with('success', 'Transactions imported successfully!');
                    }),
            ])
            ->filters([
                // Add filters if needed
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
