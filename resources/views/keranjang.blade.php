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
		@foreach($keranjangdata as $ker)
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
							<h6>Jumlah : {{$ker->jumlah}}</h6>
							<h6><strong>Total Harga : Rp {{ ($que->harga - (($que->harga) * ($que->diskon)/100)) * $ker->jumlah }}</strong></h6>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</a>
			@endforeach
		</div>
		@endforeach
		<div class="clearfix"></div>
	</div>
</div>

@endsection