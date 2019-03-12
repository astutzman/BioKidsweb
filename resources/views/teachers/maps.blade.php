@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')


<div class="row">


<h3 style="padding:10px;">My Student Observations</h3>

    <div class="container">
      <div>
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="{{ url('/teach-data')}}">Data</a></li>
          <li class="page-item active"><a class="page-link" href="{{ url('/teach-data/maps') }}">Map</a></li>
          <li class="page-item"><a class="page-link"  href="{{ url('/teach-data/progress') }}">Charts</a></li>
        </ul>
      </div>
        <div class="text-right" style="padding-left:20px;">Map Filters:
            <span><a href="{{ url('/teach-data/maps') }}">Programs and Groups</a></span>
            <span>|</span>
            <span><a href="{{ url('/teach-data/maps?filter=observations') }}">Observation Map</a></span>
        </div>
		
        <div id ="obvMap" class="well">
            <div id="map" class="map-program" data-filter="{{ $filter }}"></div>
        </div>
    </div>
</div>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection