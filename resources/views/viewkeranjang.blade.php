@extends('templateshow')
@section('title','Keranjang')
@section('main')

@foreach($keranjangdata as $ker)
<div class="pt-5 pt-lg-1 pt-md-2 ">
	<div class="topshow alert alert-primary rounded mt-5 mt-lg-1 mt-md-1">
		@if($ker->status == 1)
		<a href="/keranjang" class="text-dark"><h4><i class="fas fa-arrow-left"></i> Back</h4></a>
		@else
		<a href="/riwayat" class="text-dark"><h4><i class="fas fa-arrow-left"></i> Back</h4></a>
		@endif
	</div>
</div>

<div class="ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2">
	<div class="p-lg-4 p-md-4 p-3 bg-landinglight rounded">
		<?php
			$produk = DB::table('products')->where('id_produk', $ker->id_produk)->get();
		?>
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
				@if($ker->status == 1)
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
				@endif
				@if($ker->status != 1)
				<tr>
					<th>Harga</th>
					<td>: Rp {{$ker->harga}}</td>
				</tr>
				<tr>
					<th>Status</th>
					<td>
						: 
							@if($ker->status == 3)
							<strong class="btn btn-landingprimary rounded-pill">
							Sedang Dikemas
							</strong>
							@elseif($ker->status == 4)
							<strong class="btn btn-landingprimary rounded-pill">
							Sedang Dikirim
							</strong>
							@elseif($ker->status == 5)
							<strong class="btn btn-success rounded-pill">
							Pesanan Selesai
							</strong>
							@elseif($ker->status == 6)
							<strong class="btn btn-danger rounded-pill">
							Pesanan Dibatalkan
							</strong>
							@endif
					</td>
				</tr>
				<tr>
					<th>Banyak Pesanan</th>
					<td>: {{$ker->jumlah}} </td>
				</tr>
				@endif
			</table>
			@if($ker->status == 1)
			<form class="ms-lg-4 ms-md-4" action="/keranjang/Checkout" method="post">
				<div>
					@csrf
					<input type="hidden" name="id_keranjang" value="{{$ker->id_keranjang}}">
					<label>Jumlah yang harus dibayar</label>
					<input type="text" name="harga" class="form-control" readonly value="{{ ($pro->harga - (($pro->harga) * ($pro->diskon)/100)) * $ker->jumlah }}">
					<label>Nama Penerima</label>
					<input type="text" name="nama" class="form-control" required>
					<label>Alamat Penerima</label>
					<input type="text" name="alamat" class="form-control" required>
				</div>
				<div class="mt-2">
					<button name="keranjang" class="btn-landingprimary btn">Checkout</button>
					<a href="/keranjang/delete/{{$ker->id_keranjang}}" name="keranjang" class="btn-danger btn">Hapus dari keranjang</a>
				</div>
			</form>
			@endif
			@if($ker->status != 1)
			@foreach($tentang as $ttg)
			<a href="https://wa.me/{{$ttg->whatsapp}}" class="btn btn-success ms-lg-4 ms-md-4">Chat Penjual</a>
			@endforeach
			@endif
			@if($ker->status == 4)
			<div class="ms-lg-4 ms-md-4 mt-3">
				<label><strong>Sudah Menerima Pesanan Anda</strong></label><br>
				<a href="/keranjang/diterima/{{$ker->id_keranjang}}" class="btn btn-landingprimary">Sudah Diterima</a>
			</div>
			@endif
			@if($ker->status == 5)
				@if(($ker->penilaian == 0) || ($ker->penilaian == null))
				<div class="ms-lg-4 ms-md-4 mt-3">
					<label><strong>Bagaimana Penilaian Anda</strong></label><br>
					<form action="/keranjang/nilai/like" method="post">
						@csrf
						<input type="hidden" name="id_keranjang" value="{{$ker->id_keranjang}}">
						<input type="hidden" name="id_produk" value="{{$ker->id_produk}}">
						<button class="btn btn-success"><i class="fas fa-check-circle"></i> Suka</button>
					</form>
					<form action="/keranjang/nilai/dislike" method="post" class="mt-1">
						@csrf
						<input type="hidden" name="id_keranjang" value="{{$ker->id_keranjang}}">
						<input type="hidden" name="id_produk" value="{{$ker->id_produk}}">
						<button class="btn btn-danger"><i class="fas fa-close"></i> Tidak Suka</button>
					</form>
				</div>
				@else
				<div class="ms-lg-4 ms-md-4 mt-3">
					<label><strong>Terimakasih telah berbelanja di tempat kami <i class="fas fa-smile text-success"></i></strong></label><br>
				</div>
				@endif
			@endif
			
		</div>
		<div class="clearfix"></div>
		<hr class="mt-2 mb-2">
		@endforeach
	</div>
	@endforeach
</div>
@endsection
