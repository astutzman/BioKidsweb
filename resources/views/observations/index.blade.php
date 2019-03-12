@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')


<div class="row">


<h3 style="padding:10px;">Student Observations</h3>

    <div class="container">
      <div>
        <ul class="pagination">
          <li class="page-item active"><a class="page-link" href="#">Data</a></li>
          <li class="page-item"><a class="page-link" href="{{ url('observations/maps') }}">Map</a></li>
          <li class="page-item"><a class="page-link" href="{{ url('observations/progress') }}">Charts</a></li>
        </ul>
      </div>
		
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