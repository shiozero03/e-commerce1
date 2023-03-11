@extends('admin.template')
@section('title','Kelola User')
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
    	<h3><strong>Kelola User</strong></h3>
    	<button data-bs-toggle="modal" data-bs-target="#adddata" class="btn btn-landingprimary">Tambah User</button>
    </div>
    <hr class="mt-2 mb-2"></hr>
    <div id="banner-page">
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
	                <th>Username</th>
	                <th>Email</th>
	                <th>Aksi</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($userget as $user)
            	<tr>
	                <th>{{$user->username}}</th>
	                <th>{{$user->email}}</th>
	                <th>
	                	<a href="/admin/user/delete/{{$user->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
	   				<h1 class="modal-title fs-5" id="adddataLabel">Tambah User</h1>
	   				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
	   			</div>
		   		<div class="modal-body">
		   			<form action="{{route('tambahuser')}}" method="post">
		   			@csrf
		   				<div class="form-group">
		   					<label>Email</label>
		   					<input required type="email" name="email" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Password</label>
		   					<input required type="password" name="password" class="form-control">
		   				</div>
		   				<div class="form-group">
		   					<label>Kelas</label>
		   					<select name="is_admin" class="form-control">
		   						<option value="0">Admin</option>
		   						<option value="1">User</option>
		   					</select>
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
