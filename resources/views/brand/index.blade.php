<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('brand.create') }}" role="button">
        Create
    </a>

    <form action="" class="mb-3">
        <div class="row">

            <div class="col-md-5">
                <input type="text" name="keyword" class="form-control" placeholder="Cari brand"
                    value="{{ request('keyword') }}">
            </div>

            <div class="col-md-5">
                <select name="kategori" class="form-control">

                    <option value="">Semua kategori</option>

                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" @selected(request('kategori') == $kategori->id)>{{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2"><button class="btn btn-success">Search</button></div>

        </div>
    </form>

    <ul class="list-group">

        @foreach ($brands as $brand)
            <li class="list-group-item">

                {{ $brands->firstItem() + $loop->index }}.
                {{ $brand->nama_brand }} --
                {{ $brand->kode_brand }} --
                {{ $brand->kategori->nama_kategori }} --
                {{ $brand->jenis_brand }} --
                {{ $brand->negara_asal }} --
                {{ $brand->stok_brand }}

                <a href="{{ route('brand.show', $brand) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('brand.edit', $brand) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('brand.destroy', $brand) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda yakin?')">Delete</button>
                </form>
            </li>
        @endforeach

    </ul>

    <div class="mt-3">
        {{ $brands->links() }}
    </div>

</x-app>
