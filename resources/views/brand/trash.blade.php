<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-warning mb-3" href="{{ route('brand.index') }}" role="button">
        Kembali
    </a>

    <ul class="list-group">

        @foreach ($brands as $brand)
            <li class="list-group-item">

                {{ $loop->iteration }}.

                {{ $brand->nama_brand }} --
                {{ $brand->kode_brand }} --
                {{ $brand->jenis_brand }} --
                {{ $brand->negara_asal }} --
                {{ $brand->stok_brand }}

            </li>
        @endforeach

    </ul>

</x-app>
