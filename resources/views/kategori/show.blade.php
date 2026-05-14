<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <a href="{{ route('kategori.index') }}" class="btn btn-secondary mb-3">
        Back
    </a>

    <ul class="list-group">
        <li class="list-group-item">
            Nama Kategori : {{ $kategori->nama_kategori }}
        </li>

        <li class="list-group-item">
            Kode Kategori : {{ $kategori->kode_kategori }}
        </li>

        <li class="list-group-item">
            Deskripsi : {{ $kategori->deskripsi }}
        </li>

        <li class="list-group-item">
            Dibuat : {{ $kategori->created_at->format('d-m-Y H:i') }}
        </li>

        <li class="list-group-item">
            Diupdate : {{ $kategori->updated_at->diffForHumans() }}
        </li>
    </ul>

</x-app>
