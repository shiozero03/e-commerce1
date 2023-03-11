@extends('admin.template')
@section('title','Dashboard')
@section('main')
<style type="text/css">
	.menu-change ul li{
		display: inline-block;
	}
	@media screen and (max-width: 567px){
		.main-property{
			margin-top: 15%;
		}
	}
</style>
<div class="main-property">
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
    		<button class="btn btn-landingprimary">Tambah Banner</button>
    	</div>
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
	                <th>Gambar</th>
	                <th colspan="2">Aksi</th>
            	</tr>
            </thead>
            <tbody>
            	@foreach($bannerdata as $banner)
            	<tr>
            		<td><img src="{{ asset('mystyle/image/banner/'.$banner->imagebanner) }}" class="d-block w-25" alt="$banner->imagebanner"></td>
            		<td>
            			<button class="btn btn-landingprimary">
            				<i class="fas fa-edit"></i>
            			</button>
            		</td>
            		<td>
            			<button class="btn btn-danger">
            				<i class="fas fa-trash"></i>
            			</button>
            		</td>
            	</tr>
            	@endforeach
        	</tbody>
        </table>
    </div>
    <div id="flash-page" class="d-none">
    	<div class="top-header-main">
    		<h3><strong>Flash Sale</strong></h3>
    	</div>
    	 @csrf
        <table class="table table-striped">
            <thead>
              	<tr>
	                <th>ID</th>
	                <th>Nama</th>
	                <th>Username</th>
	                <th>Email</th>
	                <th>Aksi</th>
            	</tr>
            </thead>
            <tbody>

        	</tbody>
        </table>
    </div>
  </div>


@endsection
@section('script')
	<script type="text/javascript">
		let banner = document.getElementById('banner')
		let flash = document.getElementById('flash')
		let bannerpage = document.getElementById('banner-page')
		let flashpage = document.getElementById('flash-page')

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
	</script>
@endsection
