@extends('layout')
@section('title','Daftar')
@section('main')
<div class="container">
	<div class="ms-lg-5 me-md-5 me-lg-5 me-md-5 mt-md-5 mb-md-5 mt-3 mb-3 bg-landinglight rounded border-landingprimary d-lg-flex d-md-flex align-items-center">
		<div class="logo-register float-lg-start float-md-start col-lg-6 col-md-6 col-12 bg-landingprimary text-center d-none d-lg-flex d-md-flex align-items-center justify-content-center">
			@foreach($tentang as $ttg)
			<img src="{{ asset('mystyle/image/'.$ttg->logo) }}" width="30%">
			@endforeach
		</div>
		<div class="float-lg-start float-md-start col-lg-6 col-md-6 col-12">
			<div class="p-3">
				<h2><strong>Daftar</strong></h2>
				<small>Sudah punya akun ? <a href="masuk" class="text-landingprimary">Masuk sekarang</a></small>
				<form action="/daftar/proses" method="post" class="mt-2">
					@csrf
					<div class="form-group mt-1">
						<label><strong>Nama</strong></label>
						<input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Your name here">
						<span class="text-danger">@error('name') {{ $message }} @enderror</span>
					</div>
					<div class="form-group mt-1">
						<label><strong>Username</strong></label>
						<input type="text" value="{{ old('username') }}" name="username" class="form-control" placeholder="Your username here">
						<span class="text-danger">@error('username') {{ $message }} @enderror</span>
					</div>
					<div class="form-group mt-1">
						<label><strong>Email</strong></label>
						<input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Your email here">
						<span class="text-danger">@error('email') {{ $message }} @enderror</span>
					</div>
					<div class="form-group mt-1">
						<label><strong>No. Handphone</strong></label>
						<input type="number" name="handphone" value="{{ old('handphone') }}" class="form-control" placeholder="Your phone here">
						<span class="text-danger">@error('handphone') {{ $message }} @enderror</span>
					</div>
					<div class="form-group mt-1">
						<label><strong>Password</strong></label>
						<input type="password" name="password" class="form-control" placeholder="Your password here">
						<span class="text-danger">@error('password') {{ $message }} @enderror</span>
					</div>
					<div class="form-group mt-1">
						<label>
							<input type="checkbox" name="policy"> Baca dan setujui <a class="text-landingprimary" href="">ketentuan & layanan</a> sebelum mendaftar
						</label><br />
						<span class="text-danger">@error('policy') {{ $message }} @enderror</span>
					</div>
					<div class="form-group mt-4">
						<button class="btn btn-landingprimary form-control">Daftar</button>
					</div>
				</form>
			</div>
		</div>
		
	</div>
</div>
@endsection