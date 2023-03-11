<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Zero" />

    @foreach($tentang as $ttg)
    <link rel="icon" type="text/css" href="{{ asset('mystyle/image/'.$ttg->logo) }}">
    <title>{{$ttg->nama}} | @yield('title')</title>
    @endforeach
    
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mystyle/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mystyle/css/landingstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('owlCarousel/docs/assets/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('owlCarousel/docs/assets/owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style type="text/css">
    	.topbar div, .topbar a{
    		font-size: 90%;
    	}
    	
    	@media screen and (max-width: 768px){
    		.header-search a{
	    		font-size: 12px;
	    	}	
    	}
    	
    </style>
</head>
<body>
	<header class="fixed fixed-top">
		<div class="bg-landingprimary topbar text-landinglight">
			<div class="container pt-1 pb-1">
				<div>
					<div class="d-lg-none d-md-none text-center pb-2">
						@foreach($tentang as $ttg)
						<img src="{{ asset('mystyle/image/'.$ttg->logo) }}" width="20%">
						@endforeach
					</div>
					<hr class="pembatas mt-1 d-lg-none d-md-none">
					<div class="float-start col-lg-6 col-md-6 col-12 text-lg-start text-md-start text-center">
						Ikuti kami 
						@foreach($tentang as $ttg)
						<a href="{{$ttg->facebook}}" class="text-landinglight ms-1"><i class="fab fa-facebook"></i></a>
						<a href="{{$ttg->instagram}}" class="text-landinglight ms-1"><i class="fab fa-instagram"></i></a>
						<a href="{{$ttg->youtube}}" class="text-landinglight ms-1"><i class="fab fa-youtube"></i></a>
    					@endforeach
					</div>
					<div class="clearfix d-lg-none d-md-none"></div>
					<hr class="pembatas mt-1 d-lg-none d-md-none">
					<div class="float-start col-lg-6 col-md-6 col-12 text-lg-end text-md-end text-center">
						<a href="/" class="text-landinglight"><i class="fas fa-home me-1"></i> Beranda</a>
						<a href="bantuan" class="text-landinglight ms-2"><i class="fas fa-question-circle me-1"></i> Bantuan</a>
						@if($sessionget == 1)
							<a href="{{route('keranjang')}}" class="text-landinglight ms-2"><i class="fa-solid fa-cart-shopping"></i> Keranjang</a>
						@endif
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</header>
	<div class="bg-landingcontent pb-5 pt-5">
		@yield('main')
	</div>
	<div class="modal fade" id="pemberitahuan" tabindex="-1" aria-labelledby="pemberitahuanLabel" aria-hidden="true">
        <div class="modal-dialog">
    		<div class="modal-content">
       			<div class="modal-header">
       				<h1 class="modal-title fs-5" id="pemberitahuanLabel">Pemberitahuan</h1>
       				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
       			</div>
    	   		<div class="modal-body">
	      			<div class="text-center"></div>
      				<button class="btn btn-landingprimary">Simpan</button>
      				<div class="btn btn-landinginfo" data-bs-dismiss="modal" aria-label="Close" >Close</div>
      			</div>
      		</div>	
    	</div>
    </div>
	<footer class="bg-landingprimary w-100 text-center">
		Copyright &copy; {{config('app.name')}}
	</footer>
	<script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('owlCarousel/docs/assets/owlcarousel/owl.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

	@yield('script')
</body>
</html>