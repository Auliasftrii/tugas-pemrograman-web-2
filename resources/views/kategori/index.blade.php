<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form action="" class="mb-3">
        <input type="text" name="keyword" class="form-control" placeholder="Cari kategori"
            value="{{ request('keyword') }}">
    </form>

    <ul class="list-group">
        @foreach ($kategoris as $kategori)
            <li class="list-group-item">
                {{ $kategoris->firstItem() + $loop->index }}.
                {{ $kategori->nama_kategori }} --
                {{ $kategori->kode_kategori }} --
                {{ $kategori->deskripsi }}
            </li>
        @endforeach
    </ul>

    <div class="mt-3">
        {{ $kategoris->links() }}
    </div>

</x-app>
