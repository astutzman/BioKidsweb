@extends('layouts.indextmp')

@section('index_records')
		  				<thead class="records">
		    				<tr>
		      					<th>Group Name</th>
		      					<th>Unique Code</th>
		      					<th>Notes</th>
		    				</tr>
		  				</thead>
		  				<tbody class="records">
		  				@foreach($groups as $group)
			  				<tr>
			  					<td><a href="{{ url('groups/'.$group->id) }}">{{$group->name}}</a></td>
		  						<td>{{$group->unique_code}}</td>
		  						<td><a href="{{ url('groups/'.$group->id.'/edit') }}">Edit</a></td>
			  				</tr>
			  			@endforeach
			  			</tbody>
@endsection