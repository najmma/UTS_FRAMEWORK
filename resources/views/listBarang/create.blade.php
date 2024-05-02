@extends('layouts.app')
@section('content')
    <div class="container w-50 px-4 py-4 rounded-4 halaman-tambah">
        <h2 class="pb-4 text-center">Tambah</h2>
        <div">
            <form class="row g-3" action="{{ route('dt_barangs.store') }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" id="kode_barang" required>
                </div>
                <div class="col-md-12">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" required>
                </div>
                <div class="col-md-12">
                    <label for="harga_barang" class="form-label">Harga Barang</label>
                    <input type="number" name="harga_barang" class="form-control" id="harga_barang" required>
                </div>
                <div class="col-md-12">
                    <label for="satuan_barang" class="form-label">Satuan Barang</label>
                    <select id="satuan_barang" name="satuan_barang" class="form-select" required>
                        @foreach ($satuan as $s)
                            <option value="{{ $s->id }}" {{ old('s') == $s->id ? 'selected' : '' }}>
                                {{ $s->kode_satuan . ' - ' . $s->nama_satuan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                    <textarea name="deskripsi_barang" class="form-control" id="deskripsi_barang" cols="30" rows="2" required></textarea>
                </div>
                <div class="col-12">
                    <a class="btn btn-outline-dark px-4 mt-3" href="{{ route('dt_barangs.index') }}">Kembali</a>
                    <button type="submit" class="btn btn-success px-4 mt-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>



@endsection
