@extends('layouts.app')
@section('content')
    <div class="container w-50 px-4 py-4 rounded-4 halaman-edit">
        <h2 class="pb-4 text-center">Edit</h2>
        <div>
            <form class="row g-3" action="{{ route('dt_barangs.update', $dt_barang->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" value="{{ $dt_barang->kode_barang }}" class="form-control"
                        id="kode_barang" readonly>
                </div>
                <div class="col-md-12">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ $dt_barang->nama_barang }}" class="form-control"
                        id="nama_barang" requaired>
                </div>
                <div class="col-md-12">
                    <label for="harga_barang" class="form-label">Harga Barang</label>
                    <input type="number" name="harga_barang" value="{{ $dt_barang->harga_barang }}" class="form-control"
                        id="harga_barang" requaired>
                </div>
                <div class="col-md-12">
                    <label for="satuan_barang" class="form-label">Satuan</label>
                    <select class="form-select" name="satuan_barang" id="satuan_barang" required>
                        @php
                            $selected = '';
                            if ($errors->any()) {
                                $selected = old('satuan');
                            } else {
                                $selected = $dt_barang->satuan_barang_id;
                            }
                        @endphp
                        @foreach ($satuan as $s)
                            <option value="{{ $s->id }}" {{ $selected == $s->id ? 'selected' : '' }}>
                                {{ $s->kode_satuan . ' - ' . $s->nama_satuan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                    <textarea name="deskripsi_barang" class="form-control" id="deskripsi_barang" cols="30" rows="3" requaired>{{ $dt_barang->deskripsi_barang }}</textarea>
                </div>

                <div class="col-12">
                    <a class="btn btn-outline-secondary px-4 mt-3" href="{{ route('dt_barangs.index') }}">Kembali</a>
                    <button type="submit" class="btn btn-primary px-4 mt-3">Simpan</button>
                </div>
            </form>

        </div>
    </div>
@endsection
