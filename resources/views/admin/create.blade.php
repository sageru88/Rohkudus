
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
@extends('admin.app')
@section('title','Admin Index')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Tambah Produk</div>
                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                            <form action="{{ url('/admin')}}" method="POST">
                            @csrf
                            <tr>
                                <div align="center" align="margin">
                                Nama Barang    : <input type="text" name="nama_item" value="" /><br/>
                                Type Barang    : <input type="text" name="type" value="" /><br/>
                                Warna Barang   : <input type="text" name="warna_produk" value="" /><br/>
                                Ukuran Barang  : <input type="text" name="size" value="" /><br/>
                                Stock Produk   : <input type="text" name="stock" value="" /><br/>
                                Harga Satuan   : <input type="text" name="harga_sat" value="" /><br/><br>
                                <input type="submit" value="Simpan"/>
                                </div>
                            </tr>
                             </form>
                        </thead>
                </table>
           
        </div>
    </div>
</div>  
@endsection