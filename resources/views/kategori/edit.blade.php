<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('kategori.update', $kategori) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori"
                name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kode_kategori" class="form-label">Kode Kategori</label>
            <input type="text" class="form-control @error('kode_kategori') is-invalid @enderror" id="kode_kategori"
                name="kode_kategori" value="{{ old('kode_kategori', $kategori->kode_kategori) }}">
            @error('kode_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                name="deskripsi" value="{{ old('deskripsi', $kategori->deskripsi) }}">
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('kategori.index') }}" role="button">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app>
