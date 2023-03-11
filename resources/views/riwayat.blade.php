@extends('templateshow')
@section('title','Keranjang')
@section('main')
<div class="pt-5 pt-lg-1 pt-md-2 ">
	<div class="topshow alert alert-primary rounded mt-5 mt-lg-1 mt-md-1">
		<a href="/produk" class="text-dark"><h4><i class="fas fa-arrow-left"></i> Back</h4></a>
	</div>
</div>

<style type="text/css">
	@media screen and (max-width: 567px)
	{
		.keranjang h5{
			font-size: 70%;
		}
		.keranjang h6{
			font-size: 50%;
		}
	}
</style>
<div class="ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2">
	<div class="p-lg-4 p-md-4 p-3 bg-landinglight rounded">
		<select id="tukar" onchange="tukar()" class="form-control">
			<option value="belum">Belum Dibayar</option>
			<option value="kemas">Sedang Dikemas</option>
			<option value="proses">Sedang Diantar</option>
			<option value="selesai">Pesanan Selesai</option>
			<option value="batal">Pesanan Dibatalkan</option>
		</select>
		<div id="belum">
			@foreach($keranjangdata as $ker)
				<div class="float-start col-lg-6 col-md-6 col-12">
					<?php
						$query = DB::table('products')->where('id_produk', $ker->id_produk)->get();
					?>
					@foreach($query as $que)
					<a href="/keranjang/bayar/{{$ker->id_keranjang}}" style="color: black;">
						<div class="border-landingprimary rounded d-flex align-items-center m-2">
							<div class="float-start col-lg-3 col-md-3 col-3">
								<img src="{{ asset('mystyle/image/'.$que->featured_image) }}" class="rounded" style="width:100%">
							</div>
							<div class="float-start col-lg-9 col-md-9 col-9 keranjang">
								<div class="ms-2">
									<h5><strong>{{$que->nama_produk}}</strong></h5><br class="d-lg-block d-md-block d-none" />
									<h6>Jumlah Barang : {{$ker->jumlah}}</h6>
									<h6><strong>Harga : Rp {{ $ker->harga }}</strong></h6>
									<em class="text-danger"><small><i class="fa-solid fa-cart-shopping"></i> Belum dibayar</small></em>
								</div>
							</div>
							<div class="clearfix"></div>
							<hr class="mt-2 mb-2"></hr>
						</div>
					</a>
					@endforeach
				</div>
			@endforeach
		<div class="clearfix"></div>
		</div>
		<div id="kemas" class="d-none">
			@foreach($dikemas as $ker)
				<div class="float-start col-lg-6 col-md-6 col-12">
					<?php
						$query = DB::table('products')->where('id_produk', $ker->id_produk)->get();
					?>
					@foreach($query as $que)
					<a href="/keranjang/view/{{$ker->id_keranjang}}" style="color: black;">
						<div class="border-landingprimary rounded d-flex align-items-center m-2">
							<div class="float-start col-lg-3 col-md-3 col-3">
								<img src="{{ asset('mystyle/image/'.$que->featured_image) }}" class="rounded" style="width:100%">
							</div>
							<div class="float-start col-lg-9 col-md-9 col-9 keranjang">
								<div class="ms-2">
									<h5><strong>{{$que->nama_produk}}</strong></h5><br class="d-lg-block d-md-block d-none" />
									<h6>Jumlah Barang : {{$ker->jumlah}}</h6>
									<h6><strong>Harga : Rp {{ $ker->harga }}</strong></h6>
									<em class="text-success"><small><i class="fa-solid fa-cart-shopping"></i> Sedang Dikemas</small></em>
								</div>
							</div>
							<div class="clearfix"></div>
							<hr class="mt-2 mb-2"></hr>
						</div>
					</a>
					@endforeach
				</div>
			@endforeach
		<div class="clearfix"></div>
		</div>
		<div id="proses" class="d-none">
			@foreach($diproses as $ker)
				<div class="float-start col-lg-6 col-md-6 col-12">
					<?php
						$query = DB::table('products')->where('id_produk', $ker->id_produk)->get();
					?>
					@foreach($query as $que)
					<a href="/keranjang/view/{{$ker->id_keranjang}}" style="color: black;">
						<div class="border-landingprimary rounded d-flex align-items-center m-2">
							<div class="float-start col-lg-3 col-md-3 col-3">
								<img src="{{ asset('mystyle/image/'.$que->featured_image) }}" class="rounded" style="width:100%">
							</div>
							<div class="float-start col-lg-9 col-md-9 col-9 keranjang">
								<div class="ms-2">
									<h5><strong>{{$que->nama_produk}}</strong></h5><br class="d-lg-block d-md-block d-none" />
									<h6>Jumlah Barang : {{$ker->jumlah}}</h6>
									<h6><strong>Harga : Rp {{ $ker->harga }}</strong></h6>
									<em class="text-success"><small><i class="fa-solid fa-cart-shopping"></i> Sedang Dikirim</small></em>
								</div>
							</div>
							<div class="clearfix"></div>
							<hr class="mt-2 mb-2"></hr>
						</div>
					</a>
					@endforeach
				</div>
			@endforeach
		<div class="clearfix"></div>
		</div>
		<div id="selesai" class="d-none">
			@foreach($selesai as $ker)
				<div class="float-start col-lg-6 col-md-6 col-12">
					<?php
						$query = DB::table('products')->where('id_produk', $ker->id_produk)->get();
					?>
					@foreach($query as $que)
					<a href="/keranjang/view/{{$ker->id_keranjang}}" style="color: black;">
						<div class="border-landingprimary rounded d-flex align-items-center m-2">
							<div class="float-start col-lg-3 col-md-3 col-3">
								<img src="{{ asset('mystyle/image/'.$que->featured_image) }}" class="rounded" style="width:100%">
							</div>
							<div class="float-start col-lg-9 col-md-9 col-9 keranjang">
								<div class="ms-2">
									<h5><strong>{{$que->nama_produk}}</strong></h5><br class="d-lg-block d-md-block d-none" />
									<h6>Jumlah Barang : {{$ker->jumlah}}</h6>
									<h6><strong>Harga : Rp {{ $ker->harga }}</strong></h6>
									<em class="text-primary"><small><i class="fa-solid fa-cart-shopping"></i> Pesanan Selesai</small></em><br>
									@if(($ker->penilaian == 0) || ($ker->penilaian == null))
									<em class="text-danger"><small>Belum melakukan penilaian</small></em>
									@else
									<em class="text-success"><small>Sudah melakukan penilaian</small></em>
									@endif
								</div>
							</div>
							<div class="clearfix"></div>
							<hr class="mt-2 mb-2"></hr>
						</div>
					</a>
					@endforeach
				</div>
			@endforeach
		<div class="clearfix"></div>
		</div>
		<div id="batal" class="d-none">
			@foreach($batal as $ker)
				<div class="float-start col-lg-6 col-md-6 col-12">
					<?php
						$query = DB::table('products')->where('id_produk', $ker->id_produk)->get();
					?>
					@foreach($query as $que)
					<a href="/keranjang/view/{{$ker->id_keranjang}}" style="color: black;">
						<div class="border-landingprimary rounded d-flex align-items-center m-2">
							<div class="float-start col-lg-3 col-md-3 col-3">
								<img src="{{ asset('mystyle/image/'.$que->featured_image) }}" class="rounded" style="width:100%">
							</div>
							<div class="float-start col-lg-9 col-md-9 col-9 keranjang">
								<div class="ms-2">
									<h5><strong>{{$que->nama_produk}}</strong></h5><br class="d-lg-block d-md-block d-none" />
									<h6>Jumlah Barang : {{$ker->jumlah}}</h6>
									<h6><strong>Harga : Rp {{ $ker->harga }}</strong></h6>
									<em class="text-danger"><small><i class="fa-solid fa-cart-shopping"></i> Pesanan Dibatalkan</small></em><br>
									<em class="text-danger"><small>{{$ker->alasan}}</small></em>
								</div>
							</div>
							<div class="clearfix"></div>
							<hr class="mt-2 mb-2"></hr>
						</div>
					</a>
					@endforeach
				</div>
			@endforeach
		<div class="clearfix"></div>
		</div>
	</div>
</div>

<script type="text/javascript">

	let belum = document.getElementById('belum');
	let kemas = document.getElementById('kemas');
	let proses = document.getElementById('proses');
	let selesai = document.getElementById('selesai');
	let batal = document.getElementById('batal');

	let ka = document.getElementById('tukar');

	function tukar()
	{
		console.log(ka.value)
		if(ka.value == 'belum'){
			belum.classList.remove('d-none')
			kemas.classList.add('d-none')
			proses.classList.add('d-none')
			selesai.classList.add('d-none')
			batal.classList.add('d-none')
		} else if(ka.value == 'kemas'){
			belum.classList.add('d-none')
			kemas.classList.remove('d-none')
			proses.classList.add('d-none')
			selesai.classList.add('d-none')
			batal.classList.add('d-none')
		} else if(ka.value == 'proses'){
			belum.classList.add('d-none')
			kemas.classList.add('d-none')
			proses.classList.remove('d-none')
			selesai.classList.add('d-none')
			batal.classList.add('d-none')
		} else if(ka.value == 'selesai'){
			belum.classList.add('d-none')
			kemas.classList.add('d-none')
			proses.classList.add('d-none')
			selesai.classList.remove('d-none')
			batal.classList.add('d-none')
		} else if(ka.value == 'batal'){
			belum.classList.add('d-none')
			kemas.classList.add('d-none')
			proses.classList.add('d-none')
			selesai.classList.add('d-none')
			batal.classList.remove('d-none')
		}
	}
</script>
@endsection