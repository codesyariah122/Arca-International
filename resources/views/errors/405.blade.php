@extends('layouts.webpage')
@section('content')
<div class="container">
	<div class="row text-center">
		<div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12 p-3 error-main">
			<div class="row">
				<div class="col-lg-8 col-12 col-sm-10 offset-lg-2 offset-sm-1">
					<h1 class="m-0">405</h1>
					<h6>Arca::Backend | Test::Backend</h6>
					<a href="http://localhost:8080" class="btn btn-link">Arca International</a>
					<br>
					<a href="{{ env('APP_URL') }}" class="btn btn-link mt-5">Homepage</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection