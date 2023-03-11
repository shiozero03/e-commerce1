@extends('admin.template')
@section('title','Produk')
@section('main')
<div class="main-property">
@if ($message = Session::get('error'))
	<div class="alert alert-danger">
		Data Berhasil Dihapus
	</div>
@endif
@error('email')
	<div class="alert alert-danger">
		{{ $message }} 
	</div>
@enderror
@if ($message = Session::get('success'))
	<div class="alert alert-success">
		Data Berhasil Ditambahkan
	</div>
@endif
@foreach($produk as $pro)
	<a href="{{route('kelolaproduk')}}" class="btn btn-landingprimary">Kembali</a>
    <div class="top-header-main">
    	<h3><strong>{{$pro->nama_produk}}</strong></h3>
    </div>
    <hr class="mt-2 mb-2"></hr>
	<div class="float-start col-lg-4 col-md-4 col-12">
		<img src="{{ asset('mystyle/image/'.$pro->featured_image) }}" class="rounded" style="width:100%">
	</div>
	<div class="float-start col-lg-8 col-md-8 col-12">
		<table class="table ms-lg-4 ms-md-4 rounded">
			<tr>
				<th>Nama Produk</th>
				<td>: {{$pro->nama_produk}}</td>
			</tr>
			<tr>
				<th>Stok</th>
				<td>: {{$pro->kuantitas}}</td>
			</tr>
			<tr>
				<th>Harga Normal</th>
				<td>: Rp {{ $pro->harga }}</td>
			</tr>
			<tr>
				<th>Diskon</th>
				<td>: {{$pro->diskon}}%</td>
			</tr>
			<tr>
				<th>Harga Sekarang</th>
				<td>: Rp {{ $pro->harga - (($pro->harga) * ($pro->diskon)/100) }}</td>
			</tr>
		</table>
	</div>
	<div class="clearfix"></div>
	<hr class="mt-2 mb-2">
	<h3><strong>Spesifikasi</strong></h3>
	<?= " ".$pro->spesifikasi." " ?><br />
	<hr class="mt-2 mb-2">
	<h3><strong>Deskripsi</strong></h3>
	<?= " ".$pro->deskripsi." " ?>
	<hr class="mt-2 mb-2">
@endforeach
</div>
@endsection