@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-error">
{{ session('error') }}
</div>
@endif
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informasi Barang</div>

                <div class="card-body">
                    <table class="table table-responsive table-bordered table-hover">
                        <form action="login" method="get">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Tipe</th>
                                <th>Warna</th>
                                <th>Size</th>
                                <th>Stock</th>
                                <th>Harga Satuan</th>
                            </tr>
                        </thead>
                        <thead>
                            <tbody>
                                @foreach($barang as $row)
                                    <tr>
                                        <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
                                        <td>{{ $row->nama_item }}</td>
                                        <td>{{ $row->type }}</td>
                                        <td>{{ $row->warna_produk}}</td>
                                        <td>{{ $row->size }}</td>
                                        <td>{{ $row->stock }}</td>
                                        <td>{{ $row->harga_sat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                        </form>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
