@extends('layouts.index')

@section('nav')
	@include('layouts.nav.index')
@endsection

@section('content')
	<div class="row">
		<h2>Help for Teachers</h2>

		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Information</h3>
  			</div>
  			<div class="panel-body">
    			The Philly Scientists App webpage is for teachers working with our biodiversity curriculum and iPad app.  This site allows teachers to create groups and assign a unique code for each group to login to the iPad.  Teachers can also create locations to identify parks or school yards that students will use look for evidence of plants, insects, and animals.
  			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Register</h3>
			</div>
			<div class="panel-body">
				To begin, teachers must <a href="{{ url('/register')}}">register</a> and create an account with Philly Scientists.  Besides supplying the basic name and email address, teachers need to select the school or program that they are with as well.
				<div style="padding:4px;"><a class="btn btn-info" href="{{ url('/register')}}">Register Now</a></div>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Groups</h3>
			</div>
			<div class="panel-body">
				
					<div style="padding:4px;"><strong>Groups:</strong> Teachers can see the list of their Groups on this initial group page.</div>
					<div style="padding:4px;"><strong>Add Group:</strong> Teachers add groups to identify a set of students. A Unique Code that the students can use to register the group on the iPad app.</div>
					<div style="padding:4px;"><strong>Edit Group:</strong> Edit any group in the list by clicking the "Edit" button or link.</div>
				
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Locations</h3>
			</div>
			<div class="panel-body">
				Locations allow teachers to add alternate parks or school yards for their students to collect data from.  Otherwise, the default location will be the primary school or program that the teacher is identified with.
				<div style="padding:4px;"><strong>Locations:</strong> Teachers can see the list of locations that they have added.</div>
				<div style="padding:4px;"><strong>Add Location:</strong>Teachers can use this to add new locations to their list for students to use.</div>
				<div style="padding:4px;"><strong>Edit Location:</strong>Edit any location including the name and address.  Editing a location after data has been collected will not effect the map coordinates for past data.</div>
			</div>
		</div>	
	</div>


@endsection

@section('footer')
	@include('layouts.footer')
@endsection	