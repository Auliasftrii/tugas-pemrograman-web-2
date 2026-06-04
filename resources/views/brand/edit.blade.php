<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('brand.update', $brand) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" @selected(old('kategori_id', $brand->kategori_id) == $kategori->id)>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Brand</label>
            <input type="text" name="nama_brand" class="form-control @error('nama_brand') is-invalid @enderror"
                value="{{ old('nama_brand', $brand->nama_brand) }}">
            @error('nama_brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kode Brand</label>
            <input type="text" name="kode_brand" class="form-control @error('kode_brand') is-invalid @enderror"
                value="{{ old('kode_brand', $brand->kode_brand) }}">
            @error('kode_brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Brand</label>
            <input type="text" name="jenis_brand" class="form-control @error('jenis_brand') is-invalid @enderror"
                value="{{ old('jenis_brand', $brand->jenis_brand) }}">
            @error('jenis_brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Stok Brand</label>
            <input type="number" name="stok_brand" class="form-control @error('stok_brand') is-invalid @enderror"
                value="{{ old('stok_brand', $brand->stok_brand) }}">
            @error('stok_brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="negara_asal" class="form-label">Negara Asal</label>

            <input type="text" name="negara_asal" id="negara_asal"
                class="form-control @error('negara_asal') is-invalid @enderror"
                value="{{ old('negara_asal', $brand->negara_asal) }}">

            @error('negara_asal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <a href="{{ route('brand.index') }}" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app>
