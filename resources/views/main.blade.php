@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')
	<div class="row">
		<div class="text-center lead">
			<img src="images/phillysci-logo.png" width="50%" />
		</div>
		<div class="jumbotron main-content">
			<p>Welcome to the Philly Scientists Biodiversity Observation site. Learn more about the grant on the 
			<a href="http://www.phillyscientists.com">Philly Scientists</a> website.</p>
		</div>
	</div>
	<div class="jumbotron">
		<h4 class="lead text-center">What would you like to do?</h4>
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-info">
					<div class="panel-heading text-center">
						<h4><i class="fa fa-database fa-3x"></i></h4>
						<h4><a style="color:#ffffff;" href="observations" >View Biodiversity Data</a></h4>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-success">
					<div class="panel-heading text-center">
						<h4><i class="fa fa-users fa-3x"></i></h4>
						<h4>View Schools & Programs</h4>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-danger">
					<div class="panel-heading text-center">
						<h4><i class="fa fa-plus-square fa-3x"></i> </h4>
						<h4><a style="color:#ffffff;" href="register">Create an Account</a></h4>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

@section('footer')
	@include('layouts.footer')
@endsection