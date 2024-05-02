@extends('layouts.app')

@section('content')
    <div class="container index-barang">
        <div class="row">
            <div class="col">
                <h2 class="pb-2">List</h2>
            </div>
            <div class="col-auto">
                <a class="btn bg-info" href="{{ route('dt_barangs.create') }}">Tambah Barang</a>
            </div>
        </div>
        <table class="table table-bordered table-striped table-info mt-2">
            <thead>
                <tr>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Satuan Barang</th>
                    <th scope="col">Deskripsi Barang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($dt_barang as $barang)
                    <tr>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->harga_barang }}</td>
                        <td>{{ $barang->satuan->kode_satuan }}</td>
                        <td>{{ $barang->deskripsi_barang }}</td>

                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('dt_barangs.show', $barang->id) }}">Detail</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('dt_barangs.edit', $barang->id) }}">Edit</a>

                            <form action="{{ route('dt_barangs.destroy', $barang->id) }}" method="POST" type="button"
                                class="btn btn-danger p-0" onsubmit="return confirm('Hapus Data ?')">
                                @csrf

                                @method('DELETE')
                                <button class="btn btn-sm btn-danger m-0 border-0">Hapus</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>



@endsection
