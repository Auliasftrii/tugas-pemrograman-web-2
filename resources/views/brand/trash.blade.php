<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('brand.index') }}" role="button">Back</a>

    <ul class="list-group">

        @foreach ($brands as $brand)
            <li class="list-group-item">

                {{ $loop->iteration }}.
                {{ $brand->nama_brand }} --
                {{ $brand->kode_brand }} --
                {{ $brand->jenis_brand }} --
                {{ $brand->negara_asal }} --
                {{ $brand->stok_brand }}

                <form action="{{ route('brand.restore', $brand->id) }}" method="POST" class="d-inline">

                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-warning btn-sm"
                        onclick="return confirm('Yakin ingin mengembalikan data?')">
                        Restore
                    </button>

                </form>

            </li>
        @endforeach

    </ul>

</x-app>
