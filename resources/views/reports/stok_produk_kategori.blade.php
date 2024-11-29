<div style="padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; margin-bottom: 20px;">Laporan Stok Produk Berdasarkan Kategori</h2>

    <!-- Button to Print PDF -->
    <div style="text-align: right; margin-bottom: 15px;">
        <a href="{{ route('stok.produk.kategori.pdf') }}" style="
            background-color: #007BFF; 
            color: white; 
            padding: 10px 20px; 
            text-decoration: none; 
            border-radius: 5px;
            font-size: 14px;
        ">
            Cetak Laporan PDF
        </a>
    </div>

    <!-- Tabel -->
    <table style="
        width: 100%; 
        border-collapse: collapse; 
        margin-bottom: 20px;
        font-size: 14px;
        text-align: center;
    ">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 10px;">Nama Kategori</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Total Produk Terjual</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Total Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stokProdukKategori as $row)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $row->nama }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $row->total_produk }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ number_format($row->total_stock) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer -->
    <footer style="
        text-align: right; 
        font-size: 14px; 
        font-weight: bold; 
        color: #333; 
        margin-top: 10px;
    ">
        Total Stok Keseluruhan: {{ number_format($stokProdukKategori->sum('total_stock')) }}
    </footer>
</div>
