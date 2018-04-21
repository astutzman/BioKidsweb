@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')

<div class="row">


<h2>Student Observations</h2>

    <div class="container">
        <ul class="nav nav-pills nav-inverse" style="padding:5px;">
            <li class=""><a href="{{ url('observations') }}">Data</a></li>
            <li class=""><a href="{{ url('observations/maps') }}">Map</a></li>
            <li class="active"><a href="#">Charts</a></li>
        </ul>

        <h4>Number of Observations by Type</h4>

          <canvas id="obvChart" height="50" ></canvas>    
    </div>
	        

</div>

@endsection

@section('footer')

	@include('layouts.footer')
@endsection