@extends('admin.template')
@section('title','Riwayat')
@section('main')
<div class="main-property">
@if ($message = Session::get('error'))
	<div class="alert alert-danger">
		Data Ditolak
	</div>
@endif
@error('email')
	<div class="alert alert-danger">
		{{ $message }} 
	</div>
@enderror
@if ($message = Session::get('success'))
	<div class="alert alert-success">
		Data Diterima
	</div>
@endif
    <div class="top-header-main">
    	<h3><strong>Riwayat Penjualan</strong></h3>
    </div>
    <hr class="mt-2 mb-2"></hr>
    <div id="selesai-page">
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
              		<th>Nama Pemesan</th>
	                <th>Alamat Pemesan</th>
	                <th>Nama Produk</th>
	                <th>Harga Produk</th>
	                <th>Status</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($selesai as $ker)
            	<tr>
	            	<?php
	            		$queryproduk = DB::table('products')->where('id_produk', $ker->id_produk)->get();
	            	?>
	            		<td>{{$ker->nama_pemesan}}</td>
            			<td>{{$ker->alamat}}</td>
            		@foreach($queryproduk as $produk)
	            		<td>{{$produk->nama_produk}}</td>
            		@endforeach
	            		<td>
							Rp {{ $ker->harga }}
	            		</td>
	            		<td>
	            			<div class="btn btn-landingprimary">Selesai</div>
	            		</td>
            	</tr>
            	@endforeach
        	</tbody>
        </table>
    </div>
  </div>


@endsection
