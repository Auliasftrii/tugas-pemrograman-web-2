<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('kategori.create') }}" role="button">Create</a>

    <form action="" class="mb-3">
        <div class="row">
            <div class="col-md-5">
                <input type="text" name="keyword" class="form-control" placeholder="Cari kategori"
                    value="{{ request('keyword') }}">
            </div>

            <div class="col-md-2"><button class="btn btn-success">Search</button></div>
        </div>
    </form>

    <ul class="list-group">
        @foreach ($kategoris as $kategori)
            <li class="list-group-item">
                {{ $kategoris->firstItem() + $loop->index }}.
                {{ $kategori->nama_kategori }} --
                {{ $kategori->kode_kategori }} --
                {{ $kategori->deskripsi }}

                <a href="{{ route('kategori.show', $kategori) }}" class="btn btn-info btn-sm">
                    Detail
                </a>

                <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')">
                        Delete
                    </button>
                </form>
            </li>
        @endforeach
    </ul>

    <div class="mt-3">
        {{ $kategoris->links() }}
    </div>

</x-app>
