@extends('layout')
@section('title','Profil')
@section('main')

<div class="container">
	<div class="ps-lg-5 ps-md-5 pe-md-5 pe-lg-5 pe-md-5 pt-md-5 pb-md-5 pt-3 pb-3">
		<div class="border-landingprimary bg-landinglight" style="border-radius: 10px">
			<div>
				<style type="text/css">
					.top-profil img{
						width: 70px;
						height: 70px;
					}
				</style>
				@foreach($userdata as $user)
				<div class="p-3">
					<div class="d-flex align-items-center top-profil">
						<div class="float-start">
							@if($user->image == null)
								<img src="{{ asset('mystyle/image/logo.png') }}" width="80px" height="80px" style="border: 5px solid black; border-radius: 50%;">
							@else
								<img src="{{ asset('mystyle/image/profil/'.$user->image) }}" width="80px" height="80px" style="border: 5px solid black; border-radius: 50%;">
							@endif
						</div>
						<div class="float-start ms-3">
							<h4><strong>{{$user->nama}}</strong></h4>
						</div>
						<div class="clearfix"></div>
					</div>
					<hr class="mt-2 mb-2">
					<div class="col-lg-6 col-md-6 col-12 float-start">
						<a href="{{route('viewprofil')}}">
							<div class="d-flex align-items-center owl-menu me-lg-3 me-lg-3 me-md-2 ms-lg-2 ms-md-2 mb-2">
								<div class="float-start col-3">
									<img src="mystyle/image/PROFIL.png" width="100%" height="60px">
								</div>
								<div class="float-start col-9">
									<h4 class="ms-3"><strong>Profil</strong></h4>
								</div>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
					<div class="col-lg-6 col-md-6 col-12 float-start">
						<a href="/riwayat" class="">
							<div class="d-flex align-items-center owl-menu me-lg-3 me-lg-3 me-md-2 ms-lg-2 ms-md-2 mb-2">
								<div class="float-start col-3">
									<img src="mystyle/image/riwayat.jpg" width="100%" height="60px">
								</div>
								<div class="float-start col-9">
									<h4 class="ms-3"><strong>Riwayat</strong></h4>
								</div>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
					<div class="col-lg-6 col-md-6 col-12 float-start">
						@foreach($tentang as $ttg)
						<a href="https://wa.me/{{$ttg->whatsapp}}" class="">
							<div class="d-flex align-items-center owl-menu me-lg-3 me-lg-3 me-md-2 ms-lg-2 ms-md-2 mb-2">
								<div class="float-start col-3">
									<img src="mystyle/image/wa.jpg" width="100%" height="60px">
								</div>
								<div class="float-start col-9">
									<h4 class="ms-3"><strong>Chat Penjual</strong></h4>
								</div>
								<div class="clearfix"></div>
							</div>
						</a>
						@endforeach
					</div>
					<div class="col-lg-6 col-md-6 col-12 float-start">
						<a href="#" class="">
							<div class="d-flex align-items-center owl-menu me-lg-3 me-lg-3 me-md-2 ms-lg-2 ms-md-2 mb-2">
								<div class="float-start col-3">
									<img src="mystyle/image/voucher.png" width="100%" height="60px">
								</div>
								<div class="float-start col-9">
									<h4 class="ms-3"><strong>Voucher</strong></h4>
								</div>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
				@endforeach
				<div class="m-2">
					<a href="logout" class="btn btn-landingprimary form-control">Keluar</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection