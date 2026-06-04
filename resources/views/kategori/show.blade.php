<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <a href="{{ route('kategori.index') }}" class="btn btn-warning mb-3">Back</a>

    <h4>Data Kategori</h4>

    <ul class="list-group mb-4">
        <li class="list-group-item">Nama Kategori : {{ $kategori->nama_kategori }}</li>

        <li class="list-group-item">Kode Kategori : {{ $kategori->kode_kategori }}</li>

        <li class="list-group-item">Deskripsi : {{ $kategori->deskripsi }}</li>
    </ul>

    <h4>Data Brand</h4>

    <ul class="list-group">
        @forelse ($kategori->brands as $brand)
            <li class="list-group-item">{{ $brand->nama_brand }}</li>
        @empty
            <li class="list-group-item text-danger">Belum ada brand</li>
        @endforelse
    </ul>

</x-app>
