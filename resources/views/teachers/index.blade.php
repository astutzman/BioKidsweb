@extends('layouts.indextmp')

@section('index_records')
			  				<thead>
			    				<tr>
			      					<th>Name</th>
			      					<th>Program</th>
			      					<th>&nbsp;</th>
			    				</tr>
			  				</thead>
			  				<tbody>
			  				@foreach($teachers as $teacher)
				  				<tr>
				  					<td><a href="teachers/{{$teacher->id}}">{{$teacher->name}}</a></td>
			  						<td><a href="programs/{{$teacher->program_id}}">{{$teacher->programs->program}}</a></td>

				  					<td><a href="teachers/{{$teacher['id']}}/edit">Edit</a></td>
				  				</tr>
				  			@endforeach
@endsection