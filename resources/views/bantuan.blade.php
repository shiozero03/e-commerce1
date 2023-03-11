@extends('layout')
@section('title','FAQ')
@section('main')
<style type="text/css">
	footer{
		position: fixed;
		bottom: 0;
	}
</style>
<div class="container">
	<div class="mt-lg-5 mb-lg-5 mt-md-5 mb-md-5 mt-3 mb-3 ms-lg-5 me-lg-5 me-lg-5 me-md-5">
		<h2 class="text-center"><strong>FAQ</strong></h2>
		<form class="form-search-landing">
			<div class="form-group">
				<div class="input-group">
  					<input type="search" class="form-control p-lg-2 p-md-2 ps-3 pt-1 pb-1 pe-3 rounded-pill border-landingprimary" name="search" placeholder="Apa yang anda cari hari ini ?" >
				</div>
			</div>
		</form>
		<hr class="pembatas mt-2 mb-2">
		<div class="faq">
			<div class="mb-2">
				<div onclick="faqShow(1)" style="cursor: pointer;" class="bg-landingprimary pertanyaan rounded ps-3 text-light d-flex align-items-center">
					<h5 class="pt-2 pb-2 float-start col-10">What is Lorem Ipsum?</h5>
					<i class="ifaq1 fas fa-circle-plus bukafaq float-end ms-4 text-end col-1 d-lg-block d-md-block d-none"></i>
					<div class="clearfix"></div>
				</div>
				<div class="bg-landinginfo text-light jawaban1 rounded w-100 pb-2 ps-3 pt-3 d-none">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="mb-2">
				<div onclick="faqShow(2)" style="cursor: pointer;" class="bg-landingprimary pertanyaan rounded ps-3 text-light d-flex align-items-center">
					<h5 class="pt-2 pb-2 float-start col-10">What is Lorem Ipsum?</h5>
					<i class="ifaq2 fas fa-circle-plus bukafaq float-end ms-4 text-end col-1 d-lg-block d-md-block d-none"></i>
					<div class="clearfix"></div>
				</div>
				<div class="bg-landinginfo text-light jawaban2 rounded w-100 pb-2 ps-3 pt-3 d-none">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
	function faqShow(values){
		document.getElementsByClassName('jawaban'+values)[0].classList.toggle('d-none')
		document.getElementsByClassName('ifaq'+values)[0].classList.toggle('fa-circle-plus')
		document.getElementsByClassName('ifaq'+values)[0].classList.toggle('fa-circle-minus')
	}
</script>
@endsection