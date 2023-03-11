@extends('layout')
@section('title','Produk')
@section('main')

<div class="pt-2 ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2 kategori-home">
	<div class="bg-landinglight p-2 p-lg-5 p-md-3" style="border-radius: 10px;">	
		@if($filterproduk == 1)
		@foreach($kategoridata as $kategori)
		<div class="float-start col-lg-8 col-md-8 col-12 mt-lg-3 mt-md-2">
			<h2><strong>{{$kategori->judul}}</strong></h2>
		</div>
		@endforeach
		@else
		<div class="float-start col-lg-8 col-md-8 col-12 mt-lg-3 mt-md-2">
			<h2><strong>Semua Produk</strong></h2>
		</div>
		@endif
		<label>Filter By</label>
		<div class="float-start col-lg-4 col-md-4 col-12">
			<div class="float-start col-9">
				<select id="selectfilter" class="form-control">
					<option value="nama">Nama</option>
					<option value="harga">Harga</option>
					<option value="terlaris">Terlaris</option>
				</select>
			</div>
			<div class="float-start col-3">
				<select id="selectascdesc" class="form-control">
					<option value="asc">ASC</option>
					<option value="desc">DESC</option>
				</select>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<hr class="mt-2 mb-2"> 
		<div id="namaasc">
			@foreach($produkdataasc as $produk)
			<div class="float-start card-filter mb-2">
				<div class="card ms-2 me-2">
					<img class="card-img-top" src="{{ asset('mystyle/image/'.$produk->featured_image) }}" alt="{{$produk->featured_image}}">
					<div class="ms-2 me-2 mb-2 mt-1">
						<small style="font-size: 60%;">{{$produk->terjual}} Terjual</small>
					    <h6 class="card-title">{{$produk->nama_produk}}</h6>
					    <p class="card-text">
					    	<strong>
					    		@if($produk->diskon > 0)
					    			<p class="textpromo"><small>Rp.{{$produk->harga}}</small> Rp.{{ $produk->harga - ($produk->harga * $produk->diskon)/100 }}</p>
					    		@else
					    			Rp.{{$produk->harga}}
					    		@endif
					    	</strong>
					    </p>
					    @if($sessionget == 1)
						<a href="/produk/show/{{$produk->id_produk}}" class="btn btn-landinginfo">Beli</a>
						@else
						<a href="#" class="btn btn-landinginfo">Beli</a>
						@endif
					</div>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
		<div id="namadesc" class="d-none">
			@foreach($produkdatadesc as $produk)
			<div class="float-start card-filter mb-2">
				<div class="card ms-2 me-2">
					<img class="card-img-top" src="{{ asset('mystyle/image/'.$produk->featured_image) }}" alt="{{$produk->featured_image}}">
					<div class="ms-2 me-2 mb-2 mt-1">
						<small style="font-size: 60%;">{{$produk->terjual}} Terjual</small>
					    <h6 class="card-title">{{$produk->nama_produk}}</h6>
					    <p class="card-text">
					    	<strong>
					    		@if($produk->diskon > 0)
					    			<p class="textpromo"><small>Rp.{{$produk->harga}}</small> Rp.{{ $produk->harga - ($produk->harga * $produk->diskon)/100 }}</p>
					    		@else
					    			Rp.{{$produk->harga}}
					    		@endif
					    	</strong>
					    </p>
					    @if($sessionget == 1)
						<a href="/produk/show/{{$produk->id_produk}}" class="btn btn-landinginfo">Beli</a>
						@else
						<a href="#" class="btn btn-landinginfo">Beli</a>
						@endif
					</div>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
		<div id="hargaasc" class="d-none">
			@foreach($produkviewhargaasc as $produk)
			<div class="float-start card-filter mb-2">
				<div class="card ms-2 me-2">
					<img class="card-img-top" src="{{ asset('mystyle/image/'.$produk->featured_image) }}" alt="{{$produk->featured_image}}">
					<div class="ms-2 me-2 mb-2 mt-1">
						<small style="font-size: 60%;">{{$produk->terjual}} Terjual</small>
					    <h6 class="card-title">{{$produk->nama_produk}}</h6>
					    <p class="card-text">
					    	<strong>
					    		@if($produk->diskon > 0)
					    			<p class="textpromo"><small>Rp.{{$produk->harga}}</small> Rp.{{ $produk->harga - ($produk->harga * $produk->diskon)/100 }}</p>
					    		@else
					    			Rp.{{$produk->harga}}
					    		@endif
					    	</strong>
					    </p>
					    @if($sessionget == 1)
						<a href="/produk/show/{{$produk->id_produk}}" class="btn btn-landinginfo">Beli</a>
						@else
						<a href="#" class="btn btn-landinginfo">Beli</a>
						@endif
					</div>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
		<div id="hargadesc" class="d-none">
			@foreach($produkviewhargadesc as $produk)
			<div class="float-start card-filter mb-2">
				<div class="card ms-2 me-2">
					<img class="card-img-top" src="{{ asset('mystyle/image/'.$produk->featured_image) }}" alt="{{$produk->featured_image}}">
					<div class="ms-2 me-2 mb-2 mt-1">
						<small style="font-size: 60%;">{{$produk->terjual}} Terjual</small>
					    <h6 class="card-title">{{$produk->nama_produk}}</h6>
					    <p class="card-text">
					    	<strong>
					    		@if($produk->diskon > 0)
					    			<p class="textpromo"><small>Rp.{{$produk->harga}}</small> Rp.{{ $produk->harga - ($produk->harga * $produk->diskon)/100 }}</p>
					    		@else
					    			Rp.{{$produk->harga}}
					    		@endif
					    	</strong>
					    </p>
					    @if($sessionget == 1)
						<a href="/produk/show/{{$produk->id_produk}}" class="btn btn-landinginfo">Beli</a>
						@else
						<a href="#" class="btn btn-landinginfo">Beli</a>
						@endif
					</div>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
		<div id="terlarisasc" class="d-none">
			@foreach($produkviewterlarisasc as $produk)
			<div class="float-start card-filter mb-2">
				<div class="card ms-2 me-2">
					<img class="card-img-top" src="{{ asset('mystyle/image/'.$produk->featured_image) }}" alt="{{$produk->featured_image}}">
					<div class="ms-2 me-2 mb-2 mt-1">
						<small style="font-size: 60%;">{{$produk->terjual}} Terjual</small>
					    <h6 class="card-title">{{$produk->nama_produk}}</h6>
					    <p class="card-text">
					    	<strong>
					    		@if($produk->diskon > 0)
					    			<p class="textpromo"><small>Rp.{{$produk->harga}}</small> Rp.{{ $produk->harga - ($produk->harga * $produk->diskon)/100 }}</p>
					    		@else
					    			Rp.{{$produk->harga}}
					    		@endif
					    	</strong>
					    </p>
					    @if($sessionget == 1)
						<a href="/produk/show/{{$produk->id_produk}}" class="btn btn-landinginfo">Beli</a>
						@else
						<a href="#" class="btn btn-landinginfo">Beli</a>
						@endif
					</div>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
		<div id="terlarisdesc" class="d-none">
			@foreach($produkviewterlarisdesc as $produk)
			<div class="float-start card-filter mb-2">
				<div class="card ms-2 me-2">
					<img class="card-img-top" src="{{ asset('mystyle/image/'.$produk->featured_image) }}" alt="{{$produk->featured_image}}">
					<div class="ms-2 me-2 mb-2 mt-1">
						<small style="font-size: 60%;">{{$produk->terjual}} Terjual</small>
					    <h6 class="card-title">{{$produk->nama_produk}}</h6>
					    <p class="card-text">
					    	<strong>
					    		@if($produk->diskon > 0)
					    			<p class="textpromo"><small>Rp.{{$produk->harga}}</small> Rp.{{ $produk->harga - ($produk->harga * $produk->diskon)/100 }}</p>
					    		@else
					    			Rp.{{$produk->harga}}
					    		@endif
					    	</strong>
					    </p>
					    @if($sessionget == 1)
						<a href="/produk/show/{{$produk->id_produk}}" class="btn btn-landinginfo">Beli</a>
						@else
						<a href="#" class="btn btn-landinginfo">Beli</a>
						@endif
					</div>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>	
	</div>
</div>
<script type="text/javascript">
	let filterby = document.getElementById('selectfilter')
	let filtersc = document.getElementById('selectascdesc')

	let namaasc = document.getElementById('namaasc')
	let namadesc = document.getElementById('namadesc')
	let hargaasc = document.getElementById('hargaasc')
	let hargadesc = document.getElementById('hargadesc')
	let terlarisasc = document.getElementById('terlarisasc')
	let terlarisdesc = document.getElementById('terlarisdesc')

	filterby.addEventListener('change', function(){
		if(filterby.value == 'nama' && filtersc.value == 'asc'){
			namaasc.classList.remove('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'nama' && filtersc.value == 'desc'){
			namaasc.classList.add('d-none')
			namadesc.classList.remove('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'harga' && filtersc.value == 'asc'){
			namaasc.classList.add('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.remove('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'harga' && filtersc.value == 'desc'){
			namaasc.classList.add('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.remove('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'terlaris' && filtersc.value == 'asc'){
			namaasc.classList.add('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.remove('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'terlaris' && filtersc.value == 'desc'){
			namaasc.classList.add('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.remove('d-none')
		}
	})

	filtersc.addEventListener('change', function(){
		if(filterby.value == 'nama' && filtersc.value == 'asc'){
			namaasc.classList.remove('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'nama' && filtersc.value == 'desc'){
			namaasc.classList.add('d-none')
			namadesc.classList.remove('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'harga' && filtersc.value == 'asc'){
			namaasc.classList.add('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.remove('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'harga' && filtersc.value == 'desc'){
			namaasc.classList.add('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.remove('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'terlaris' && filtersc.value == 'asc'){
			namaasc.classList.add('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.remove('d-none')
			terlarisdesc.classList.add('d-none')
		} else if(filterby.value == 'terlaris' && filtersc.value == 'desc'){
			namaasc.classList.add('d-none')
			namadesc.classList.add('d-none')

			hargaasc.classList.add('d-none')
			hargadesc.classList.add('d-none')

			terlarisasc.classList.add('d-none')
			terlarisdesc.classList.remove('d-none')
		}
	})
</script>
@endsection