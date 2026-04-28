<x-App>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('produk.create') }}" role="button">Create</a>

    <ul class="list-group">
        @foreach ($produks as $produk)
            <li class="list-group-item">
                {{ $loop->iteration }}.{{ $produk->kode_produk }} -- {{ $produk->nama_produk }}
                --
                {{ $produk->kategori }} -- {{ $produk->stok }} -- {{ $produk->harga }}</li>
        @endforeach
    </ul>

</x-App>
