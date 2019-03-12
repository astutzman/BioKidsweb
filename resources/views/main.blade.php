@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')
	<div class="jumbotron bg-white mx-auto" style="width:75%;">
		<h2 class="display-3">
			<img src="images/phillysci-logo.png" width="50%" />
		</h2>
		<p class="h4">
		Welcome to the Philly Scientists Biodiversity Observation site.<br /> Learn more about the grant on the 
			<a href="http://www.phillyscientists.com">Philly Scientists</a> website.
		</p>
	</div>
	<div class="jumbotron">
		<h3 style="padding:20px;" class="text-center">What would you like to do?</h3>
		<div class="row">
			<div class="col-sm-6">
				<div class="card bg-info text-white">
					<div class="card-body text-center">
						<h5><i class="fa fa-database fa-3x"></i></h5>
						<h5><a style="color:#ffffff;" href="{{url('/observations')}}" >View Biodiversity Data</a></h5>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card bg-success text-white">
					<div class="card-body text-center">
						<h5><i class="fa fa-plus-square fa-3x"></i> </h5>
						<h5><a style="color:#ffffff;" href="{{url('/register')}}">Create an Account</a></h5>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

@section('footer')
	@include('layouts.footer')
@endsection