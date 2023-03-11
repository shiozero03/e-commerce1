@extends('admin.template')
@section('title','Checkout')
@section('main')
<div class="main-property">
@if ($message = Session::get('error'))
	<div class="alert alert-danger">
		Data Dibatalkan
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
@if ($message = Session::get('info'))
	<div class="alert alert-success">
		Data Dikirim
	</div>
@endif
    <div class="top-header-main">
    	<h3><strong>Kelola Checkout</strong></h3>
    </div>
    <hr class="mt-2 mb-2"></hr>
    <div class="menu-change">
    	<nav>
    		<ul>
    			<a id="banner" class="banner btn btn-landingprimary"><li>Belum Dibayar</li></a>
    			<a id="kemas" class="flash btn btn-landinginfo"><li>Pengemasan</li></a>
    			<a id="proses" class="flash btn btn-landinginfo"><li>Proses</li></a>
    			<a id="selesai" class="flash btn btn-landinginfo"><li>Selesai</li></a>
    			<a id="batal" class="flash btn btn-landinginfo"><li>Dibatalkan</li></a>
    		</ul>
    	</nav>
    </div>
    <div id="banner-page">
    	<div class="top-header-main">
    		<h3><strong>Belum Dibayar</strong></h3>
    	</div>
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
              		<th>Nama User</th>
	                <th>Nama Produk</th>
	                <th>Harga Produk</th>
	                <th>Bukti Bayar</th>
	                <th>Aksi</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($belumbayar as $ker)
            	<tr>
	            	<?php
	            		$queryuser = DB::table('users')->where('id', $ker->id_user)->get();
	            		$queryproduk = DB::table('products')->where('id_produk', $ker->id_produk)->get();
	            	?>
	            	@foreach($queryuser as $us)
	            		<td>{{$us->nama}}</td>
            		@endforeach
            		@foreach($queryproduk as $produk)
	            		<td>{{$produk->nama_produk}}</td>
	            		<td>
							Rp {{ ($produk->harga - (($produk->harga) * ($produk->diskon)/100)) * $ker->jumlah }}
	            		</td>
            		@endforeach
            			<td width="20%">
            				<img src="{{ asset('mystyle/image/bukti/'.$ker->bukti_pembayaran) }}" width="100%">
            			</td>
            			<td>
            				<form action="/admin/checkout/diterima/" method="post">
            					@csrf
            					@foreach($queryproduk as $produk)
            					<input type="hidden" name="id_produk" value="{{$produk->id_produk}}">
            					@endforeach
            					<input type="hidden" name="id_keranjang" value="{{$ker->id_keranjang}}">
	            				<button type="submit" class="btn btn-landingprimary"><i class="fas fa-check-circle"></i></button>
	            				<a href="/admin/checkout/dibatalkan/{{$ker->id_keranjang}}" class="btn btn-danger"><i class="fas fa-close"></i></a>
            				</form>
            			</td>
            	</tr>
            	@endforeach
        	</tbody>
        </table>
    </div>
    <div id="flash-page" class="d-none">
    	<div class="top-header-main">
    		<h3><strong>Sedang Dikemas</strong></h3>
    	</div>
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
              		<th>Nama Pemesan</th>
	                <th>Alamat Pemesan</th>
	                <th>Nama Produk</th>
	                <th>Harga Produk</th>
	                <th>Aksi</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($dikemas as $ker)
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
	            			<a href="/admin/checkout/kemas/{{$ker->id_keranjang}}"><i class="fas fa-check-circle btn btn-landingprimary"></i></a>
	            		</td>
            	</tr>
            	@endforeach
        	</tbody>
        </table>
    </div>
    <div id="proses-page" class="d-none">
    	<div class="top-header-main">
    		<h3><strong>Diproses</strong></h3>
    	</div>
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
              		<th>Nama Pemesan</th>
	                <th>Alamat Pemesan</th>
	                <th>Nama Produk</th>
	                <th>Harga Produk</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($proses as $ker)
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
            	</tr>
            	@endforeach
        	</tbody>
        </table>
    </div>
    <div id="selesai-page" class="d-none">
    	<div class="top-header-main">
    		<h3><strong>Selesai</strong></h3>
    	</div>
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
              		<th>Nama Pemesan</th>
	                <th>Alamat Pemesan</th>
	                <th>Nama Produk</th>
	                <th>Harga Produk</th>
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
            	</tr>
            	@endforeach
        	</tbody>
        </table>
    </div>
    <div id="batal-page" class="d-none">
    	<div class="top-header-main">
    		<h3><strong>Dibatalkan</strong></h3>
    	</div>
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
              		<th>Nama Pemesan</th>
	                <th>Alamat Pemesan</th>
	                <th>Nama Produk</th>
	                <th>Harga Produk</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($batal as $ker)
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
            	</tr>
            	@endforeach
        	</tbody>
        </table>
    </div>
  </div>


@endsection
@section('script')
	<script type="text/javascript">
		let banner = document.getElementById('banner')
		let flash = document.getElementById('kemas')
		let proses = document.getElementById('proses')
		let selesai = document.getElementById('selesai')
		let batal = document.getElementById('batal')

		let bannerpage = document.getElementById('banner-page')
		let flashpage = document.getElementById('flash-page')
		let prosespage = document.getElementById('proses-page')
		let selesaipage = document.getElementById('selesai-page')
		let batalpage = document.getElementById('batal-page')

		let icon = document.getElementById('icon')
		let imagefet = document.getElementById('imagefet')

		banner.addEventListener('click', function(){
			banner.classList.add('btn-landingprimary')
			banner.classList.remove('btn-landinginfo')

			flash.classList.remove('btn-landingprimary')
			flash.classList.add('btn-landinginfo')

			proses.classList.remove('btn-landingprimary')
			proses.classList.add('btn-landinginfo')

			selesai.classList.remove('btn-landingprimary')
			selesai.classList.add('btn-landinginfo')

			batal.classList.remove('btn-landingprimary')
			batal.classList.add('btn-landinginfo')

			bannerpage.classList.remove('d-none')
			flashpage.classList.add('d-none')
			prosespage.classList.add('d-none')
			selesaipage.classList.add('d-none')
			batalpage.classList.add('d-none')
		})
		flash.addEventListener('click', function(){
			banner.classList.remove('btn-landingprimary')
			banner.classList.add('btn-landinginfo')

			flash.classList.add('btn-landingprimary')
			flash.classList.remove('btn-landinginfo')

			proses.classList.remove('btn-landingprimary')
			proses.classList.add('btn-landinginfo')

			selesai.classList.remove('btn-landingprimary')
			selesai.classList.add('btn-landinginfo')

			batal.classList.remove('btn-landingprimary')
			batal.classList.add('btn-landinginfo')

			bannerpage.classList.add('d-none')
			flashpage.classList.remove('d-none')
			prosespage.classList.add('d-none')
			selesaipage.classList.add('d-none')
			batalpage.classList.add('d-none')
		})
		proses.addEventListener('click', function(){
			banner.classList.remove('btn-landingprimary')
			banner.classList.add('btn-landinginfo')

			flash.classList.remove('btn-landingprimary')
			flash.classList.add('btn-landinginfo')

			proses.classList.add('btn-landingprimary')
			proses.classList.remove('btn-landinginfo')

			selesai.classList.remove('btn-landingprimary')
			selesai.classList.add('btn-landinginfo')

			batal.classList.remove('btn-landingprimary')
			batal.classList.add('btn-landinginfo')

			bannerpage.classList.add('d-none')
			flashpage.classList.add('d-none')
			prosespage.classList.remove('d-none')
			selesaipage.classList.add('d-none')
			batalpage.classList.add('d-none')
		})
		selesai.addEventListener('click', function(){
			banner.classList.remove('btn-landingprimary')
			banner.classList.add('btn-landinginfo')

			flash.classList.remove('btn-landingprimary')
			flash.classList.add('btn-landinginfo')

			proses.classList.remove('btn-landingprimary')
			proses.classList.add('btn-landinginfo')

			selesai.classList.add('btn-landingprimary')
			selesai.classList.remove('btn-landinginfo')

			batal.classList.remove('btn-landingprimary')
			batal.classList.add('btn-landinginfo')

			bannerpage.classList.add('d-none')
			flashpage.classList.add('d-none')
			prosespage.classList.add('d-none')
			selesaipage.classList.remove('d-none')
			batalpage.classList.add('d-none')
		})
		batal.addEventListener('click', function(){
			banner.classList.remove('btn-landingprimary')
			banner.classList.add('btn-landinginfo')

			flash.classList.remove('btn-landingprimary')
			flash.classList.add('btn-landinginfo')

			proses.classList.remove('btn-landingprimary')
			proses.classList.add('btn-landinginfo')

			selesai.classList.remove('btn-landingprimary')
			selesai.classList.add('btn-landinginfo')

			batal.classList.add('btn-landingprimary')
			batal.classList.remove('btn-landinginfo')

			bannerpage.classList.add('d-none')
			flashpage.classList.add('d-none')
			prosespage.classList.add('d-none')
			selesaipage.classList.add('d-none')
			batalpage.classList.remove('d-none')
		})

		icon.addEventListener('change', function () {
	        gambar(this);
	    })
	    function gambar(a) {
	        if (a.files && a.files[0]) {     
	            var reader = new FileReader();    
	            reader.onload = function (e) {
	                imagefet.src=e.target.result;
	            }    
	            reader.readAsDataURL(a.files[0]);
	        }
	    }
	</script>
@endsection
