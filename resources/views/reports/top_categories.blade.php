<div style="padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; margin-bottom: 20px;">Laporan Kategori Terlaris</h2>

    <!-- Button untuk Cetak PDF -->
    <div style="text-align: right; margin-bottom: 15px;">
        <a href="{{ route('top-categories.pdf') }}" style="
            background-color: #007BFF; 
            color: white; 
            padding: 10px 20px; 
            text-decoration: none; 
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
        ">
            Cetak Laporan PDF
        </a>
    </div>

    <!-- Tabel Laporan -->
    <table style="
        width: 100%; 
        border-collapse: collapse; 
        margin-bottom: 20px;
        text-align: center;
        font-size: 14px;
    ">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 10px;">Kategori</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Total Terjual</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Jumlah Produk Terjual</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topCategories as $category)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $category->kategori_nama }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $category->total_quantity_sold }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $category->total_products_sold }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">Rp {{ number_format($category->total_revenue, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer -->
    <footer style="
        text-align: center; 
        margin-top: 30px; 
        font-size: 12px; 
        color: #666;
    ">
        <p>&copy; 2024 Toys Hobbies. Semua hak dilindungi.</p>
        <p>Email: info@toyshobbies.com | Telepon: (021) 123-4567</p>
    </footer>
</div>