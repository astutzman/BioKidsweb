@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')

    @auth
    <!--Auth Roles Only!! -->
        @if(Auth::user()->role != $template_vars['role']) 
        	
        	@include('auth.autherrors')

		@else
			<!--no create button for Admin->Teachers -->
			@if($template_vars['title'] == 'Teacher')
				<style> #index_btn{display:none;}</style>
			@endif

			<div class="content">
				<div class="row">
					<div class="col-sm-6 h2 text-left">
						{{$template_vars['titlepl']}}
					</div>
					<div id="index_btn" class="col-sm-6 text-right">
						<a href="{{strtolower($template_vars['titlepl'])}}/create" class="btn btn-primary">New {{$template_vars['title']}}</a>
					</div>
				</div>

				<div class="well">
					<table class="table table-bordered table-hover records">
						@yield('index_records')
			  		</table>
			  	</div>
		  	</div> 
		@endif
	@endsection
@endauth

@section('footer')
	@include('layouts.footer')
@endsection