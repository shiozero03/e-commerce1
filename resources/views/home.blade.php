@extends('layout')
@section('title','Beranda')
@section('main')

@if ($message = Session::get('success'))
	<script type="text/javascript">
		swal('Berhasil', 'Anda berhasil login', 'success')
	</script>
@endif
@if ($message = Session::get('info'))
	<script type="text/javascript">
		swal('Berhasil', 'Data anda berhasil logout', 'success')
	</script>
@endif
@if ($message = Session::get('admin'))
	<script type="text/javascript">
		swal('Gagal', 'Anda bukan admin', 'error')
	</script>
@endif
<div class="pt-2 ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2 bg-landinglight cover-top">
	<div class="ps-lg-3 ps-md-3 pe-lg-3 pe-md-3">
		<div style="margin-bottom: -10px;">
			<div id="carouselExampleControls" class="carousel slide ms-lg-2 me-lg-2 ms-md-2 me-md-2" data-bs-ride="carousel">
			  	<div class="carousel-inner banner-top">
			  		@foreach($bannerdata as $banner)
			    	<div class="carousel-item bannerimg">
			      		<img src="{{ asset('mystyle/image/banner/'.$banner->imagebanner) }}" class="d-block w-100" alt="$banner->imagebanner">
			    	</div>
			    	@endforeach
			  	</div>
			  	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
			    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    	<span class="visually-hidden">Previous</span>
			  	</button>
			  	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
		    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
			    	<span class="visually-hidden">Next</span>
			  	</button>
			</div>
		</div>
		<style type="text/css">
			.gambar-sale{
				cursor: pointer;
				transition: .5s;
			}
			.gambar-sale img:hover{
				border: 10px solid black;
				filter: contrast(150%);
				transition: .5s;
			}
			.item{
				transition: .5s ease;
			}
			.item:hover{
				margin-top: -5px;
				transition: .5s ease;
			}
			.ball{
				border-radius: 50%;
				width: 20px;
				height: 20px;
			}
			ul.bal{
				animation: gerak 20s infinite;	
			}
			@keyframes gerak{
				0%{
					margin-left: 10%;
				}
				10%{
					margin-left: 25%;
				}
				20%{
					margin-left: 40%;
				}
				30%{
					margin-left: 55%;
				}
				40%{
					margin-left: 70%;
				}
				50%{
					margin-left: 85%;
				}
				60%{
					margin-left: 70%;
				}
				70%{
					margin-left: 55%;
				}
				80%{
					margin-left: 40%;
				}
				90%{
					margin-left: 25%;
				}
				100%{
					margin-left: 10%;
				}

			}
			ul li.ball{
				display: inline-block;
			}
		</style>
		<ul class="bal">
			<li class="ball bg-landingprimary"></li>
			<li class="ball bg-success"></li>
			<li class="ball bg-landinginfo"></li>
		</ul>
			@foreach($flashsale as $flash)
		<div class="float-start col-3 flash-sale-2 d-lg-block d-md-block d-none gambar-sale">
			<img src="{{ asset('mystyle/image/banner/'.$flash->imagebanner) }}" class="d-block" style="width: 96%; margin: 0 2%;" alt="$flash->imagebanner">
		</div>
			@endforeach
		<div class="clearfix"></div>
		<br /><br />
	</div>
</div>
<br>
<div class="pt-2 ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2 kategori-home">
	<div class="bg-landinglight p-2 p-lg-5 p-md-3" style="border-radius: 10px;">	
		<h2><strong>Kategori</strong></h2>
		<hr class="mt-2 mb-2"> 
		<div class="owl-carousel owl-theme">
			@foreach($kategoridata as $kategori)
			<div class="item">
				@if($sessionget == 1)
				<a href="/produk/filter/{{$kategori->id_kategori}}" class="text-landingprimary">
				@else
				<a href="#" class="text-landingprimary">
				@endif
					<div class="d-flex align-items-center owl-menu">
						<div class="float-start col-3">
							<img src="{{ asset('mystyle/image/'.$kategori->icon) }}">
						</div>
						<div class="float-start col-9">
							<h4 class="ms-3"><strong>{{$kategori->judul}}</strong></h4>
						</div>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
			@endforeach
		</div>	
	</div>
</div>
<div class="pt-2 ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2 kategori-home">
	<div class="bg-landinglight p-2 p-lg-5 p-md-3" style="border-radius: 10px;">	
		<h2><strong>Flash Sale</strong></h2>
		<hr class="mt-2 mb-2"> 
		<div class="owl-carousel owl-theme">
			@foreach($flashdata as $flash)
			<div class="item">
				@if($sessionget == 1)
				<a href="/produk/show/{{$flash->id_produk}}" class="text-landingprimary">
				@else
				<a href="#" class="text-landingprimary">
				@endif
					<div class="d-flex align-items-center owl-menu">
						<div class="float-start col-4">
							<img src="{{ asset('mystyle/image/'.$flash->featured_image) }}">
						</div>
						<div class="float-start col-8">
							<h6 class="ms-3">
								<strong>{{$flash->nama_produk}}</strong><br /><hr class="me-2 mt-2 mb-2">
								<small>Rp.{{ $flash->harga - ($flash->harga * $flash->diskon)/100 }}</small>
							</h6>
						</div>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
			@endforeach
		</div>	
	</div>
</div>
<div class="pt-2 ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2 kategori-home">
	<div class="bg-landinglight p-2 p-lg-5 p-md-3" style="border-radius: 10px;">	
		<h2><strong>Terbaru</strong></h2>
		<hr class="mt-2 mb-2"> 
		@foreach($produkdata as $produk)
		<div class="float-start card-terlaris">
			<div class="card ms-2 me-2">
				<img class="card-img-top" src="{{ asset('mystyle/image/'.$produk->featured_image) }}" alt="{{$produk->featured_image}}">
				<div class="ms-2 me-2 mb-2 coba">
				<hr>
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
				</div>
				    @if($sessionget == 1)
					<a href="/produk/show/{{$produk->id_produk}}" class="btn btn-landinginfo">Beli</a>
					@else
					<a href="#" class="btn btn-landinginfo">Beli</a>
					@endif
			</div>
		</div>
		@endforeach
		<div class="clearfix"></div>
		<div class="text-center mt-2">
			@if($sessionget == 1)
			<a href="/produk" class="btn btn-landingprimary">Lihat Selengkapnya</a>
			@else
			<a href="#" class="btn btn-landingprimary">Lihat Selengkapnya</a>
			@endif
		</div>
	</div>
</div>
<div class="pt-2 ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2 kategori-home">
	<div class="bg-landinglight p-2 p-lg-5 p-md-3" style="border-radius: 10px;">	
		<h2><strong>Terlaris</strong></h2>
		<hr class="mt-2 mb-2"> 
		@foreach($terlaris as $laris)
		<div class="float-start card-terlaris">
			<div class="card ms-2 me-2">
				<img class="card-img-top" src="{{ asset('mystyle/image/'.$laris->featured_image) }}" alt="{{$laris->featured_image}}">
				<div class="ms-2 me-2 mb-2 coba">
				<hr>
					<small style="font-size: 60%;">{{$laris->terjual}} Terjual</small>
				    <h6 class="card-title mt-2">{{$laris->nama_produk}}</h6>
				    <p class="card-text">
				    	<strong>
				    		@if($laris->diskon > 0)
				    			Rp.{{ $laris->harga - ($laris->harga * $laris->diskon)/100 }}
				    		@else
				    			Rp.{{$laris->harga}}
				    		@endif
				    	</strong>
				    </p>
				</div>
				    @if($sessionget == 1)
					<a href="/produk/show/{{$laris->id_produk}}" class="btn btn-landinginfo">Beli</a>
					@else
					<a href="#" class="btn btn-landinginfo">Beli</a>
					@endif
			</div>
		</div>
		@endforeach
		<div class="clearfix"></div>
		<div class="text-center mt-2">
			@if($sessionget == 1)
			<a href="/produk" class="btn btn-landingprimary">Lihat Selengkapnya</a>
			@else
			<a href="#" class="btn btn-landingprimary">Lihat Selengkapnya</a>
			@endif
		</div>
	</div>
</div>
<!-- Favorit belum lengkap -->
<div class="pt-2 ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2 kategori-home">
	<div class="bg-landinglight p-2 p-lg-5 p-md-3" style="border-radius: 10px;">	
		<h2><strong>Favorit</strong></h2>
		<hr class="mt-2 mb-2"> 
		@foreach($favorite as $fav)
		<div class="float-start card-terlaris">
			<div class="card ms-2 me-2">
				<img class="card-img-top" src="{{ asset('mystyle/image/'.$fav->featured_image) }}" alt="{{$fav->featured_image}}">
				<div class="ms-2 me-2 mb-2 coba">
				<hr>
					<small style="font-size: 60%;">
						<i class="fas fa-heart me-1"></i> {{$fav->suka}}
					</small>
				    <h6 class="card-title mt-2">{{$fav->nama_produk}}</h6>
				    <p class="card-text">
				    	<strong>
				    		@if($fav->diskon > 0)
				    			Rp.{{ $fav->harga - ($fav->harga * $fav->diskon)/100 }}
				    		@else
				    			Rp.{{$fav->harga}}
				    		@endif
				    	</strong>
				    </p>
				</div>
				    @if($sessionget == 1)
					<a href="/produk/show/{{$fav->id_produk}}" class="btn btn-landinginfo">Beli</a>
					@else
					<a href="#" class="btn btn-landinginfo">Beli</a>
					@endif
			</div>
		</div>
		@endforeach
		<div class="clearfix"></div>
		<div class="text-center mt-2">
			@if($sessionget == 1)
			<a href="/produk" class="btn btn-landingprimary">Lihat Selengkapnya</a>
			@else
			<a href="#" class="btn btn-landingprimary">Lihat Selengkapnya</a>
			@endif
		</div>
		</div>
	</div>
</div>
<!-- End -->
</script>
@endsection
@section('script')
<script type="text/javascript">
	document.getElementsByClassName('bannerimg')[0].classList.add('active')
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    nav: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection