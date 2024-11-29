<div style="padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; margin-bottom: 20px;">Laporan Penjualan per Produk</h2>

    <!-- Tombol Cetak PDF -->
    <div style="text-align: right; margin-bottom: 15px;">
        <a href="{{ route('sales-by-produk.pdf') }}" style="
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
                <th style="border: 1px solid #ddd; padding: 10px;">Nama Produk</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Nama Kategori</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Total Penjualan</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Total Kuantitas</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesData as $data)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $data->produk_nama }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $data->kategori_nama }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $data->total_sales }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $data->total_quantity }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">Rp {{ number_format($data->total_revenue, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer -->
    <footer style="
        text-align: center; 
        font-size: 12px; 
        color: #666; 
        margin-top: 20px;
        border-top: 1px solid #ddd;
        padding-top: 10px;
    ">
        <p>&copy; 2024 Toys Hobbies. Semua hak dilindungi.</p>
        <p>Email: info@toyshobbies.com | Telepon: (021) 123-4567</p>
    </footer>
</div>
