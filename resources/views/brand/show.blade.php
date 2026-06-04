<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <a href="{{ route('brand.index') }}" class="btn btn-primary mb-3">
        Back
    </a>

    <ul class="list-group">
        <li class="list-group-item">Nama Brand: {{ $brand->nama_brand }}</li>

        <li class="list-group-item">Kode Brand: {{ $brand->kode_brand }}</li>

        <li class="list-group-item">Kategori: {{ $brand->kategori->nama_kategori }}</li>

        <li class="list-group-item">Jenis Brand: {{ $brand->jenis_brand }}</li>

        <li class="list-group-item">Stok Brand: {{ $brand->stok_brand }}</li>

        <li class="list-group-item">Dibuat: {{ $brand->created_at->format('d F Y H:i:s') }}</li>

        <li class="list-group-item">
            Update: {{ $brand->updated_at->diffForHumans() }}
        </li>
    </ul>
</x-app>
