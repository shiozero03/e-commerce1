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
@foreach($produk as $pro)
	<a href="{{route('kelolaproduk')}}" class="btn btn-landingprimary">Kembali</a>
    <div class="top-header-main">
    	<h3><strong>{{$pro->nama_produk}}</strong></h3>
    </div>
    <hr class="mt-2 mb-2"></hr>
    <form action="{{route('updateproduk')}}" method="post" enctype="multipart/form-data">
    	@csrf
		<div class="float-start col-lg-4 col-md-4 col-12">
			<input type="text" name="id_produk" value="{{$pro->id_produk}}" class="form-control mb-1">
			<input onchange="gambar(this)" type="file" name="icon" id="icon" class="form-control mb-1">
			<img src="{{ asset('mystyle/image/'.$pro->featured_image) }}" id="imagefet" class="rounded" style="width:100%">
		</div>
		<div class="float-start col-lg-7 col-md-7 col-12">
			<table class="table ms-lg-4 ms-md-4 rounded">
				<tr>
					<th>Nama Produk</th>
					<td>
						<input required type="text" class="form-control" name="nama_produk" value="{{$pro->nama_produk}}"></input>
					</td>
				</tr>
				<tr>
					<th>Stok</th>
					<td>
						<input required type="number" class="form-control" name="kuantitas" value="{{$pro->kuantitas}}"></input>
					</td>
				</tr>
				<tr>
					<th>Harga Normal</th>
					<td>
						<input required type="number" onkeyup="cekharga()" class="form-control" id="harga" name="harga" value="{{$pro->harga}}"></input>
					</td>
				</tr>
				<tr>
					<th>Diskon (dalam %)</th>
					<td>
						<input type="number" onkeyup="cekdiskon()" class="form-control" id="diskon" name="diskon" value="{{$pro->diskon}}"></input>
					</td>
				</tr>
				<tr>
					<th>Harga Sekarang</th>
					<td>
						<input class="form-control" id="totaldiskon" readonly></input>
					</td>
				</tr>
			</table>
		</div>
		<div class="clearfix"></div>
		<hr class="mt-2 mb-2">
		<h3><strong>Spesifikasi</strong></h3>
		<textarea required name="spesifikasi" class="ckeditor" id="ckeditor">{{$pro->spesifikasi}}</textarea><br />
		<hr class="mt-2 mb-2">
		<h3><strong>Deskripsi</strong></h3>
		<textarea required name="deskripsi" class="ckeditor" id="ckeditor">{{$pro->deskripsi}}</textarea><br />
		<hr class="mt-2 mb-2">
		<button class="btn btn-landingprimary mb-5">Simpan</button>
	</form>
@endforeach
</div>
<script type="text/javascript">
		let icon = document.getElementById('icon')
		let imagefet = document.getElementById('imagefet')

		let harga = document.getElementById('harga');
		let diskon = document.getElementById('diskon');
		let totaldiskon = document.getElementById('totaldiskon');
		
		function cekharga(){
			totaldiskon.value = harga.value - (harga.value * diskon.value/100)
		}
		function cekdiskon(){
			totaldiskon.value = harga.value - (harga.value * diskon.value/100)
		}
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
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection
