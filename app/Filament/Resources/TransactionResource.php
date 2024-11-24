<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TransactionsImport;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Data Transaksi';
    protected static ?string $navigationGroup = 'Laporan';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('transaction_number')->required()->maxLength(255),
                Forms\Components\TextInput::make('telepon')->required()->maxLength(255),
                Forms\Components\TextInput::make('no_resi')->maxLength(255),
                Forms\Components\TextInput::make('kurir')->required()->maxLength(255),
                Forms\Components\TextInput::make('kota')->required()->maxLength(255),
                Forms\Components\TextInput::make('ongkir')->required()->numeric(),
                Forms\Components\TextInput::make('total')->required()->numeric(),
                Forms\Components\Textarea::make('alamat')->required(),
                Forms\Components\DateTimePicker::make('date')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('importExcel')
                ->label('Import Excel')
                ->action(function (array $data) {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new TransactionsImport, $filePath);

                        Notification::make()
                            ->title('Data berhasil diimpor!')
                            ->success()
                            ->send();
                    })
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih File Excel')
                            ->disk('public') // Pastikan sesuai dengan disk yang digunakan
                            ->directory('imports')
                            ->acceptedFileTypes([
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/vnd.ms-excel',
                            ])
                            ->required(),
                    ])
                    ->modalHeading('Import Data Transaksi')
                    ->modalButton('Import')
                    ->color('success'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
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
