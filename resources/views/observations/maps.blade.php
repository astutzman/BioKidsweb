@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')


<div class="row">


<h2>Student Observations</h2>

    <div class="container">
        <ul class="nav nav-pills nav-inverse" style="padding:5px;">
            <li class=""><a href="{{ url('/observations')}}">Data</a></li>
            <li class="active"><a href="{{ url('/observations/maps') }}">Map</a></li>
            <li class=""><a href="{{ url('/observations/progress')}}">Charts</a></li>
        </ul>
        <div class="text-right" style="padding-left:20px;">Map Filters:
                <span><a href="{{ url('maps') }}">Programs and Groups</a></span>
                <span>|</span>
                <span><a href="{{ url('maps?filter=observations') }}">Observation Map</a></span>
        </div>
		
        <div id ="obvMap" class="well">
            
            <div id="map" class="map-program" data-filter="{{ $filter }}">
                
            </div>

        </div>
    </div>
</div>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection