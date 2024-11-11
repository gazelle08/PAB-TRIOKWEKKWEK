
    <h1>Laporan Penjualan per Produk</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Nama Kategori</th>
                <th>Total Penjualan</th>
                <th>Total Kuantitas</th>
                <th>Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesData as $data)
                <tr>
                    <td>{{ $data->produk_nama }}</td>
                    <td>{{ $data->kategori_nama }}</td>
                    <td>{{ $data->total_sales }}</td>
                    <td>{{ $data->total_quantity }}</td>
                    <td>{{ number_format($data->total_revenue, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        © 2024 Toko Medan Toys Hobbies. All rights reserved.
    </footer>
@endsection
