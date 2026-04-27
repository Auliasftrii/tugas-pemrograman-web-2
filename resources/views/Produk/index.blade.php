<x-App>

    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @foreach ($produks as $produk)
            <li class="list-group-item">{{ $loop->iteration }}.{{ $produk->kode_produk }} -- {{ $produk->nama_produk }}
                --
                {{ $produk->kategori }} -- {{ $produk->stok }} -- {{ $produk->harga }}</li>
        @endforeach
    </ul>

</x-App>
