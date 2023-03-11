@extends('admin.template')
@section('title','Produk')
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
@if ($message = Session::get('info'))
	<div class="alert alert-success">
		Data Berhasil Diupdate
	</div>
@endif
    <div class="top-header-main">
    	<h3><strong>Kelola Produk</strong></h3>
    </div>
    <hr class="mt-2 mb-2"></hr>
    <div class="menu-change">
    	<nav>
    		<ul>
    			<a id="kategori" class="banner btn btn-landingprimary"><li>Kategori</li></a>
    			<a id="flash" class="flash btn btn-landinginfo"><li>Produk</li></a>
    		</ul>
    	</nav>
    </div>
    <div id="banner-page">
    	<div class="top-header-main">
    		<h3><strong>Kategori</strong></h3>
    		<button class="btn btn-landingprimary" data-bs-toggle="modal" data-bs-target="#adddata" class="btn btn-landingprimary">Tambah Kategori</button>
    	</div>
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
	                <th>Icon</th>
	                <th>Nama</th>
	                <th>Aksi</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($kategoriview as $kat)
            	<tr>
            		<td style="width: 25%"><img src="{{ asset('mystyle/image/'.$kat->icon) }}" class="w-50"></td>
            		<td>{{$kat->judul}}</td>
            		<td>
            			<a class="btn btn-landingprimary" href="/admin/produk/delete/kategori/{{$kat->id_kategori}}">
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
    		<h3><strong>Produk</strong></h3>
    		<button class="btn btn-landingprimary" data-bs-toggle="modal" data-bs-target="#adddataproduk">Tambah Produk</button>
    	</div>
    	 @csrf
        <table class="table table-striped">
           <thead>
              	<tr>
	                <th>Gambar</th>
	                <th>Nama Produk</th>
	                <th>Aksi</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($produk as $kat)
            	<tr>
            		<td style="width: 25%"><img src="{{ asset('mystyle/image/'.$kat->featured_image) }}" class="w-50"></td>
            		<td>{{$kat->nama_produk}}</td>
            		<td>
            			<a class="btn btn-landingprimary" href="/admin/produk/view/{{$kat->id_produk}}">
            				<i class="fas fa-eye"></i>
            			</a>
            			<a class="btn btn-success" href="/admin/produk/edit/{{$kat->id_produk}}">
            				<i class="fas fa-edit"></i>
            			</a>
            			<a class="btn btn-danger" href="/admin/produk/delete/{{$kat->id_produk}}">
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
	   				<h1 class="modal-title fs-5" id="adddataLabel">Tambah Kategori</h1>
	   				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
	   			</div>
		   		<div class="modal-body">
		   			<form action="{{route('tambahkategori')}}" method="post" enctype="multipart/form-data">
		   			@csrf
		   				<div class="form-group">
		   					<div>
								<img src="" id="imagefet" width="100%">
							</div>
		   					<label>Icon</label>
		   					<input required type="file" id="icon" name="icon" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Nama</label>
		   					<input required type="text" name="judul" class="form-control">
		   				</div>
	      			<div class="text-center mt-3"></div>
	  				<button type="submit" class="btn btn-landingprimary">Simpan</button>
	  				<div class="btn btn-landinginfo" data-bs-dismiss="modal" aria-label="Close" >Close</div>
		   			</form>
	  			</div>
	  		</div>	
		</div>
	</div>
	<div class="modal fade" id="adddataproduk" tabindex="-1" aria-labelledby="adddataprodukLabel" aria-hidden="true">
	    <div class="modal-dialog">
			<div class="modal-content">
	   			<div class="modal-header">
	   				<h1 class="modal-title fs-5" id="adddataprodukLabel">Tambah Produk</h1>
	   				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
	   			</div>
		   		<div class="modal-body">
		   			<form action="{{route('tambahproduk')}}" method="post" enctype="multipart/form-data">
		   			@csrf
		   				<div class="form-group">
		   					<div>
								<img src="" id="imagefet2" width="100%">
							</div>
		   					<label>Foto</label>
		   					<input required type="file" id="icon2" name="icon" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Nama produk</label>
		   					<input required type="text" name="nama" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Kategori</label>
		   					<select id="kategori" name="kategori" class="form-control">
		   						@foreach($kategoriview as $kat)
		   						<option value="{{$kat->id_kategori}}">{{$kat->judul}}</option>
		   						@endforeach
		   					</select>
		   				</div>
		   				<div class="form-group">
		   					<label>Harga</label>
		   					<input required type="number" name="harga" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Kuantitas</label>
		   					<input required type="number" name="kuantitas" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Spesifikasi</label>
		   					<textarea name="spesifikasi" required id="ckeditor" class="ckeditor"></textarea>
		   				</div>
		   				<div class="form-group">
		   					<label>Deskripsi</label>
		   					<textarea name="deskripsi" required id="ckeditor" class="ckeditor"></textarea>
		   				</div>

	      			<div class="text-center mt-3"></div>
	  				<button type="submit" class="btn btn-landingprimary">Simpan</button>
	  				<div class="btn btn-landinginfo" data-bs-dismiss="modal" aria-label="Close" >Close</div>
		   			</form>
	  			</div>
	  		</div>	
		</div>
	</div>
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('script')
	<script type="text/javascript">
		let icon = document.getElementById('icon')
		let imagefet = document.getElementById('imagefet')
		let icon2 = document.getElementById('icon2')
		let imagefet2 = document.getElementById('imagefet2')

		let kategori = document.getElementById('kategori')
		let flash = document.getElementById('flash')
		let bannerpage = document.getElementById('banner-page')
		let flashpage = document.getElementById('flash-page')

		flash.addEventListener('click', function(){
			kategori.classList.remove('btn-landingprimary')
			kategori.classList.add('btn-landinginfo')

			flash.classList.add('btn-landingprimary')
			flash.classList.remove('btn-landinginfo')

			bannerpage.classList.add('d-none')
			flashpage.classList.remove('d-none')
		})
		kategori.addEventListener('click', function(){
			kategori.classList.add('btn-landingprimary')
			kategori.classList.remove('btn-landinginfo')

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
	    icon2.addEventListener('change', function () {
	        gambar2(this);
	    })
	    function gambar2(a) {
	        if (a.files && a.files[0]) {     
	            var reader = new FileReader();    
	            reader.onload = function (e) {
	                imagefet2.src=e.target.result;
	            }    
	            reader.readAsDataURL(a.files[0]);
	        }
	    }
	</script>
@endsection
