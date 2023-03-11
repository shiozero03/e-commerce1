@extends('admin.template')
@section('title','Pembayaran')
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
    	<h3><strong>Kelola Pembayaran</strong></h3>
    	<button data-bs-toggle="modal" data-bs-target="#adddata" class="btn btn-landingprimary">Tambah Metode Pembayaran</button>
    </div>
    <hr class="mt-2 mb-2"></hr>
    <div id="banner-page">
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
	                <th>Jenis</th>
	                <th>Nomor</th>
	                <th>Atas Nama</th>
	                <th>Aksi</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($pembayaran as $bayar)
            	<tr>
	                <td>{{$bayar->jenis}}</td>
	                <td>{{$bayar->nomor}}</td>
	                <td>{{$bayar->atasnama}}</td>
	                <th>
	                	<a href="/admin/pembayaran/delete/{{$bayar->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
	                </th>
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
	   				<h1 class="modal-title fs-5" id="adddataLabel">Tambah Pembayaran</h1>
	   				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
	   			</div>
		   		<div class="modal-body">
		   			<form action="{{route('tambahpembayaran')}}" method="post">
		   			@csrf
		   				<div class="form-group">
		   					<label>Jenis Pembayaran</label>
		   					<input required type="text" name="jenis" placeholder="BRI/BNI/DANA ..." class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Nomor</label>
		   					<input required type="number" name="nomor" placeholder="Nomor Rekening" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Atas Nama</label>
		   					<input required type="text" name="atasnama" placeholder="Nama" class="form-control">
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

@endsection
