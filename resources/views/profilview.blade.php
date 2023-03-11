@extends('layout')
@section('title','Profil')
@section('main')

@foreach($userdata as $user)
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
					<table class="table table-striped">
						<tr>
							<th>Nama</th>
							<td>: {{$user->nama}}</td>
							<th>Username</th>
							<td>: {{$user->username}}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>: {{$user->email}}</td>
							<th>Nomor Handphone</th>
							<td>: {{$user->handphone}}</td>
						</tr>
						<tr>
							<th>Password</th>
							<td>: ***********************</td>
							<th>Type</th>
							<td>
								: 
								@if($user->is_admin == 0)
								Admin
								@else
								User
								@endif
							</td>
						</tr>
					</table>
					<div class="clearfix"></div>
				</div>
				<div class="m-2">
					<a data-bs-toggle="modal" data-bs-target="#adddata" class="btn btn-landingprimary form-control">Update Data</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="adddata" tabindex="-1" aria-labelledby="adddataLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
   			<div class="modal-header">
   				<h1 class="modal-title fs-5" id="adddataLabel">Update</h1>
   				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
   			</div>
	   		<div class="modal-body">
	   			<form action="{{route('updateprofil')}}" method="post" enctype="multipart/form-data">
	   			@csrf
	   				<div class="form-group">
	   					<input type="hidden" name="type" value="{{$user->id}}">
	   					<div>
							<img src="{{ asset('mystyle/image/bukti/'.$user->image) }}" id="imagefet" width="100%">
						</div>
	   					<label>Foto Profil</label>
	   					<input required type="file" id="icon" name="icon" class="form-control">
	   				</div>
	   				<div class="form-group">
	   					<label>Nama</label>
	   					<input type="text" name="nama" class="form-control" value="{{$user->nama}}">
	   				</div>
	   				<div class="form-group">
	   					<label>Username</label>
	   					<input type="text" name="username" class="form-control" value="{{$user->username}}">
	   				</div>
	   				<div class="form-group">
	   					<label>Email</label>
	   					<input type="email" name="email" class="form-control" value="{{$user->email}}">
	   				</div>
	   				<div class="form-group">
	   					<label>Nomor Handphone</label>
	   					<input type="number" name="handphone" class="form-control" value="{{$user->handphone}}">
	   				</div>
      			<div class="text-center mt-3"></div>
  				<button type="submit" class="btn btn-landingprimary">Simpan</button>
  				<div class="btn btn-landinginfo" data-bs-dismiss="modal" aria-label="Close" >Close</div>
	   			</form>
  			</div>
  		</div>	
	</div>
</div>
	<script type="text/javascript">
		let icon = document.getElementById('icon')
		let imagefet = document.getElementById('imagefet')

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
@endforeach

@endsection