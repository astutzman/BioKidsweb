@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')

<div class="row">


<h2>Student Observations</h2>

    <div class="container">
        <ul class="nav nav-pills nav-inverse" style="padding:5px;">
            <li class=""><a href="{{ url('teach-data/') }}">Data</a></li>
            <li class=""><a href="{{ url('teach-data/maps') }}">Map</a></li>
            <li class="active"><a href="{{ url('teach-data/progress?filter=') }}">Charts</a></li>
        </ul>

        <h4>Number of Observations by Type</h4>
        <p><a href="{{ url('observations/typebar') }}?filter={{$filter}}" target="_blank">Data File</a></p>

          <canvas id="obvChart" height="50" data-filter="{{ $filter }}" ></canvas>    
    </div>
	        

</div>

@endsection

@section('footer')

	@include('layouts.footer')
@endsection