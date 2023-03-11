@extends('admin.template')
@section('title','Home')
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
		Data Berhasil Ditambahkan
	</div>
@endif
    <div class="top-header-main">
    	<h3><strong>Kelola Home</strong></h3>
    </div>
    <hr class="mt-2 mb-2"></hr>
    <div class="menu-change">
    	<nav>
    		<ul>
    			<a id="banner" class="banner btn btn-landingprimary"><li>Banner</li></a>
    			<a id="flash" class="flash btn btn-landinginfo"><li>Flash Sale</li></a>
    		</ul>
    	</nav>
    </div>
    <div id="banner-page">
    	<div class="top-header-main">
    		<h3><strong>Banner</strong></h3>
    		<button class="btn btn-landingprimary" data-bs-toggle="modal" data-bs-target="#adddata">Tambah Banner</button>
    	</div>
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
	                <th>Gambar</th>
	                <th>Aksi</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($bannerdata as $banner)
            	<tr>
            		<td style="width:50%"><img src="{{ asset('mystyle/image/banner/'.$banner->imagebanner) }}" class="d-block w-50" alt="$banner->imagebanner"></td>
            		<td>
            			<a href="/admin/home/delete/{{$banner->id}}" id="formshow{{$banner->id}}" class="btn btn-danger formshow">
            				<i class="fas fa-trash"></i>
            			</a>
            		</td>
            	</tr>
            	@endforeach
        	</tbody>
        </table>
    </div>
    <div id="flash-page" class="d-none">
    	<div class="top-header-main">
    		<h3><strong>Flash Sale</strong></h3>
    		<button class="btn btn-landingprimary" data-bs-toggle="modal" data-bs-target="#adddataflash">Tambah Flashsale</button>
    	</div>
    	 @csrf
        <table class="table table-striped">
           <thead>
              	<tr>
	                <th>Gambar</th>
	                <th>Aksi</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($flashsale as $flash)
            	<tr>
            		<td style="width:50%"><img src="{{ asset('mystyle/image/banner/'.$flash->imagebanner) }}" class="d-block w-50" alt="$flash->imagebanner"></td>
            		<td>
            			<a href="/admin/home/delete/{{$flash->id}}" id="formshow{{$flash->id}}" class="btn btn-danger formshow">
            				<i class="fas fa-trash"></i>
            			</a>
            		</td>
            	</tr>
            	@endforeach
        	</tbody>
        </table>
    </div>
  </div>

<div class="modal fade" id="adddata" tabindex="-1" aria-labelledby="adddataLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
   			<div class="modal-header">
   				<h1 class="modal-title fs-5" id="adddataLabel">Tambah Banner</h1>
   				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
   			</div>
	   		<div class="modal-body">
	   			<form action="{{route('tambahhome')}}" method="post" enctype="multipart/form-data">
	   			@csrf
	   				<div class="form-group">
	   					<input type="hidden" name="type" value="banner">
	   					<div>
							<img src="" id="imagefet" width="100%">
						</div>
	   					<label>Gambar</label>
	   					<input required type="file" id="icon" name="imagebanner" class="form-control">
	   				</div>
      			<div class="text-center mt-3"></div>
  				<button type="submit" class="btn btn-landingprimary">Simpan</button>
  				<div class="btn btn-landinginfo" data-bs-dismiss="modal" aria-label="Close" >Close</div>
	   			</form>
  			</div>
  		</div>	
	</div>
</div>
<div class="modal fade" id="adddataflash" tabindex="-1" aria-labelledby="adddataflashLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
   			<div class="modal-header">
   				<h1 class="modal-title fs-5" id="adddataflashLabel">Tambah Flashsale</h1>
   				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
   			</div>
	   		<div class="modal-body">
	   			<form action="{{route('tambahhome')}}" method="post" enctype="multipart/form-data">
	   			@csrf
	   				<div class="form-group">
	   					<input type="hidden" name="type" value="flashsale">
	   					<div>
							<img src="" id="imagefet" width="100%">
						</div>
	   					<label>Gambar</label>
	   					<input required type="file" id="icon" name="imagebanner" class="form-control">
	   				</div>
      			<div class="text-center mt-3"></div>
  				<button type="submit" class="btn btn-landingprimary">Simpan</button>
  				<div class="btn btn-landinginfo" data-bs-dismiss="modal" aria-label="Close" >Close</div>
	   			</form>
  			</div>
  		</div>	
	</div>
</div>


@endsection
@section('script')
	<script type="text/javascript">
		let banner = document.getElementById('banner')
		let flash = document.getElementById('flash')
		let bannerpage = document.getElementById('banner-page')
		let flashpage = document.getElementById('flash-page')

		let icon = document.getElementById('icon')
		let imagefet = document.getElementById('imagefet')

		flash.addEventListener('click', function(){
			banner.classList.remove('btn-landingprimary')
			banner.classList.add('btn-landinginfo')

			flash.classList.add('btn-landingprimary')
			flash.classList.remove('btn-landinginfo')

			bannerpage.classList.add('d-none')
			flashpage.classList.remove('d-none')
		})
		banner.addEventListener('click', function(){
			banner.classList.add('btn-landingprimary')
			banner.classList.remove('btn-landinginfo')

			flash.classList.remove('btn-landingprimary')
			flash.classList.add('btn-landinginfo')

			bannerpage.classList.remove('d-none')
			flashpage.classList.add('d-none')
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
