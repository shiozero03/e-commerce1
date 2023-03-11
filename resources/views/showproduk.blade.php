@extends('templateshow')
@section('title','Produk')
@section('main')
<div class="pt-5 pt-lg-1 pt-md-2 ">
	<div class="topshow alert alert-primary rounded mt-5 mt-lg-1 mt-md-1">
		<a href="/produk" class="text-dark"><h4><i class="fas fa-arrow-left"></i> Back</h4></a>
	</div>
</div>
	
<div class="ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2">
	<div class="p-lg-4 p-md-4 p-3 bg-landinglight rounded">
		@foreach($produk as $pro)
		<div class="topshow alert alert-dark rounded">
			<h3>{{$pro->nama_produk}}</h3>
		</div>
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
			<form class="mt-lg-5 mt-md-4 mt-3 ms-lg-4 ms-md-4" action="/keranjang/add" method="post">
				<div>
					@csrf
					<input type="hidden" name="id_produk" value="{{$pro->id_produk}}">
					<label>Total</label>
					<input type="number" name="total" id="coba" class="form-control" value="0" min="1">
				</div>
				<div class="mt-2">
					<button name="keranjang" class="btn-landingprimary btn">Masukkan Keranjang</button>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
		<hr class="mt-2 mb-2">
		<h3><strong>Spesifikasi</strong></h3>
			<?= " ".$pro->spesifikasi." " ?>
		<br />
		<hr class="mt-2 mb-2">
		<h3><strong>Deskripsi</strong></h3>
		<?= " ".$pro->deskripsi." " ?>
		<hr class="mt-2 mb-2">
		@endforeach
	</div>
</div> 
@endsection