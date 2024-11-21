<?php

namespace App\Imports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionsImport implements ToModel
{
    public function model(array $row)
    {
        return new Transaction([
            'transaction_number' => $row[0],
            'telepon' => $row[1],
            'no_resi' => $row[2],
            'kurir' => $row[3],
            'kota' => $row[4],
            'ongkir' => $row[5],
            'total' => $row[6],
            'bukti_transaksi' => $row[7],
            'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]),
            'alamat' => $row[9],
        ]);
    }
}
