@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')


<div class="row">


<h2>Student Observations</h2>

    <div class="container">
        <ul class="nav nav-pills nav-inverse" style="padding:5px;">
            <li class="active"><a href="#">Data</a></li>
            <li class=""><a href="{{ url('teach-data/maps') }}">Map</a></li>
            <li class=""><a href="{{ url('teach-data/progress') }}">Charts</a></li>
        </ul>
		
        <div id ="obvTable" class="well">
            <table id="observeTable" class="display table table-striped table-hover" width="100%">


    		</table>
    	</div>
    	<div id="obvmodal" class="modal">
      		<div class="modal-dialog">
        		<div class="modal-content">
          			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          			</div>
          			<div class="modal-body">
            			<img id="modal-image" class="img img-thumbnail" :src="modalimg" />
          			</div>
          			<div class="modal-footer">
            			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          			</div>
        		</div>
      		</div>
    	</div>
        <div id="obvMap">
            <div class="well" style="display:none;">
                <div id="map">This is your map</div>
            </div>
        </div>


    </div>
</div>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection