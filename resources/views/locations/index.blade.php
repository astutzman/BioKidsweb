@extends('layouts.indextmp')

@section('index_records')
		  				<thead class="records">
		    				<tr>
		      					<th>Location Name</th>
		      					<th>Street</th>
		      					<th>&nbsp;</th>
		    				</tr>
		  				</thead>
		  				<tbody class="records">
		  				@foreach($locations as $location)
			  				<tr>
			  					<td><a href="locations/{{$location->id}}">{{$location->name}}</a></td>
		  						<td>{{$location->address}}</td>
		  						<td><a href="locations/{{$location->id}}/edit">Edit</a></td>
			  				</tr>
			  			@endforeach
			  			</tbody>
@endsection