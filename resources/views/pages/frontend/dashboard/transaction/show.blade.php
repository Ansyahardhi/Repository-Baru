<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction &raquo; #{{ $transaksi->id }} {{ $transaksi->nama }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            //Ajax DataTable

            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}'
                },
                columns: [
                        { data: 'id', name: 'id', width: '5%'},
                        { data: 'product.nama', name: 'product.nama'},
                        { data: 'product.harga', name: 'product.harga'},
                ]
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">
                Transaction Detail
            </h2>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full"> 
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">Nama</th>
                                <td class="border px-6 py-4">{{ $transaksi->nama }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Email</th>
                                <td class="border px-6 py-4">{{ $transaksi->email }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Alamat</th>
                                <td class="border px-6 py-4">{{ $transaksi->alamat }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">No_Hp</th>
                                <td class="border px-6 py-4">{{ $transaksi->no_hp }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Kurir</th>
                                <td class="border px-6 py-4">{{ $transaksi->kurir }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Pembayaran</th>
                                <td class="border px-6 py-4">{{ $transaksi->pembayaran }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Pembayaran URL</th>
                                <td class="border px-6 py-4">{{ $transaksi->pembayaran_url }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Total Harga</th>
                                <td class="border px-6 py-4">{{ number_format($transaksi->total_harga) }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Status</th>
                                <td class="border px-6 py-4">{{ $transaksi->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">
                Transaction Item
            </h2>
            <div class="shadow overflow-hidden sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
