@extends('admin.template')
@section('title','Tentang')
@section('main')
<div class="main-property">
@if ($message = Session::get('error'))
	<div class="alert alert-danger">
		Data Berhasil Dihapus
	</div>
@endif
@error('email')
	<div class="alert alert-danger">
		{{ $message }} 
	</div>
@enderror
@if ($message = Session::get('success'))
	<div class="alert alert-success">
		Data Berhasil Diupdate
	</div>
@endif

@foreach($tentang as $ttg)
    <div class="top-header-main">
    	<h3><strong>Tentang Aplikasi</strong></h3>
    	<button data-bs-toggle="modal" data-bs-target="#adddata" class="btn btn-landingprimary">Update Tentang</button>
    </div>
    <hr class="mt-2 mb-2"></hr>
    <div id="banner-page">
    	<h4><strong>Logo</strong></h4>
    	<img src="{{ asset('mystyle/image/'.$ttg->logo) }}" width="10%">
    	<table class="table">
    		<tr>
    			<th>Nama Aplikasi</th>
    			<td>: {{$ttg->nama}}</td>
    		</tr>
    		<tr>
    			<th>Nomor Whatsapp</th>
    			<td>: {{$ttg->whatsapp}}</td>
    		</tr>
    		<tr>
    			<th>Link Facebook</th>
    			<td>: {{$ttg->facebook}}</td>
    		</tr>
    		<tr>
    			<th>Link Instagram</th>
    			<td>: {{$ttg->instagram}}</td>
    		</tr>
    		<tr>
    		<tr>
    			<th>Link Youtube</th>
    			<td>: {{$ttg->youtube}}</td>
    		</tr>
    	</table>       	
    </div>
</div>
	<div class="modal fade" id="adddata" tabindex="-1" aria-labelledby="adddataLabel" aria-hidden="true">
	    <div class="modal-dialog">
			<div class="modal-content">
	   			<div class="modal-header">
	   				<h1 class="modal-title fs-5" id="adddataLabel">Tentang Aplikasi</h1>
	   				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
	   			</div>
		   		<div class="modal-body">
		   			<form action="{{route('updatetentang')}}" method="post" enctype="multipart/form-data">
		   			@csrf
		   				<div class="form-group">
		   					<div class="text-center">
								<img src="{{asset('mystyle/image/'.$ttg->logo)}}" id="imagefet" width="50%">
							</div>
		   					<label>Ganti Logo</label>
		   					<input type="file" id="icon" name="icon" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Nama Aplikasi</label>
		   					<input required type="text" name="nama" value="{{$ttg->nama}}" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Nomor Whatsapp</label>
		   					<input required type="text" name="whatsapp" value="{{$ttg->whatsapp}}" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Link Facebook</label>
		   					<input type="text" name="facebook" value="{{$ttg->facebook}}" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Link Instagram</label>
		   					<input type="text" name="instagram" value="{{$ttg->instagram}}" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Link Youtube</label>
		   					<input type="text" name="youtube" value="{{$ttg->youtube}}" class="form-control">
		   				</div>
		   				
	      			<div class="text-center mt-3"></div>
	  				<button type="submit" class="btn btn-landingprimary">Simpan</button>
	  				<div class="btn btn-landinginfo" data-bs-dismiss="modal" aria-label="Close" >Close</div>
		   			</form>
	  			</div>
	  		</div>	
		</div>
	</div>
@endforeach


@endsection
@section('script')
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
@endsection
