@extends('layout')
@section('title','Login')
@section('main')

@if ($message = Session::get('success'))
	<script type="text/javascript">
		swal('Berhasil', 'Data anda berhasil didaftarkan', 'success')
	</script>
@endif

@if ($message = Session::get('error'))
  <script type="text/javascript">
		swal('Gagal', 'Email atau password anda salah', 'error')
	</script>
@endif

@if ($message = Session::get('info'))
  <script type="text/javascript">
		swal('Gagal', 'Anda harus login terlebih dahulu', 'error')
	</script>
@endif

@if ($message = Session::get('danger'))
  <script type="text/javascript">
		swal('Berhasil', 'Password anda berhasil diganti', 'success')
	</script>
@endif

<div class="container">
	<div class="ps-lg-5 ps-md-5 pe-md-5 pe-lg-5 pe-md-5 pt-md-5 pb-md-5 pt-3 pb-3">
		<div class="border-landingprimary bg-landinglight d-lg-flex d-md-flex align-items-center" style="border-radius: 10px">
			<div class="logo-login float-lg-start float-md-start col-lg-6 col-md-6 col-12 bg-landingprimary text-center d-none d-lg-flex d-md-flex align-items-center justify-content-center">
				@foreach($tentang as $ttg)
				<img src="{{ asset('mystyle/image/'.$ttg->logo) }}" width="30%">
				@endforeach
			</div>
			<div class="float-lg-start float-md-start col-lg-6 col-md-6 col-12">
				<div class="p-3">
					<h2><strong>Masuk</strong></h2>
					<small>Belum punya akun ? <a href="daftar" class="text-landingprimary">Daftar sekarang</a></small>
					<form action="/masuk/proses" method="post" class="mt-2">
						@csrf
						<div class="form-group mt-1">
							<label><strong>Email</strong></label>
							<input type="text" name="email" class="form-control" placeholder="Your email here">
							<span class="text-danger">@error('email') {{ $message }} @enderror</span>
						</div>
						<div class="form-group mt-1">
							<label><strong>Password</strong></label>
							<input type="password" name="password" class="form-control" placeholder="Your password here">
							<span class="text-danger">@error('password') {{ $message }} @enderror</span>
						</div>
						<div class="form-group mt-1">
							<div class="float-end">
								<a href="lupa-password" class="text-landingprimary">Lupa password</a>
							</div>
							<div class="clearfix"></div>
							<button class="btn btn-landingprimary form-control">Masuk</button>
						</div>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection