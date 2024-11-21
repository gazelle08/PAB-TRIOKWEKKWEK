<?php

namespace App\Imports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Transaction([
            'transaction_number' => $row['transaction_number'],
            'telepon' => $row['telepon'],
            'kota' => $row['kota'],
            'kurir' => $row['kurir'],
            'total' => $row['total'],
            'ongkir' => $row['ongkir'],
            'alamat' => $row['alamat'],
            'date' => \Carbon\Carbon::parse($row['date']),
        ]);
    }
}
