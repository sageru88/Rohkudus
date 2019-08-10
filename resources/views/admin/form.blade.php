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
        @csrf
        
        @if(!empty($barang))
        
        @method('PATCH')
        
        @endif
<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Form Produk</div>
                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                            <tr>
                                <div align="center" align="margin">
                                <form action="{{ url('admin', @$barang->id) }}" method="POST">	
								Nama Barang    : <input type="text" name="nama_item" value="{{ old('nama_item', @$barang->nama_item) }}" /><br/>
								Type Barang    : <input type="text" name="type" value="{{ old('type',  @$barang->type) }}" /><br/>
								Warna Barang   : <input type="text" name="warna_produk" value="{{ old('warna_produk',  @$barang->warna_produk) }}" /><br/>
								Ukuran Barang  : <input type="text" name="size" value="{{ old('size',  @$barang->size) }}" /><br/>
								Stock Produk   : <input type="text" name="stock" value="{{ old('stock',  @$barang->stock) }}" /><br/>
								Harga Satuan   : <input type="text" name="harga_sat" value="{{ old('harga_sat',  @$barang->harga_sat) }}" /><br/>
								<input type="submit" value="Simpan" />
								</form>

                                </div>
                            </tr>
                        </thead>
                    </table>
        	</div>
    	</div>
	</div>  
@endsection