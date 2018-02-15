@extends('layouts.indextmp')

@section('index_records')
		  				<thead>
		    				<tr>
		      					<th>Program Name</th>
		      					<th>Street</th>
		      					<th>Teachers</th>
		      					<th>&nbsp;</th>
		    				</tr>
		  				</thead>
		  				<tbody>
		  				@foreach($programs as $program)
			  				<tr>
			  					<td><a href="programs/{{$program->id}}">{{$program['program']}}</a></td>
		  						<td>{{$program['address']}}</td>
			  					<td><a href="program/teachers/{{$program['id']}}">Teachers</a></td>
			  					<td><a href="programs/{{$program['id']}}/edit">Edit</a></td>
			  				</tr>
			  			@endforeach
			  			</tbody>
@endsection