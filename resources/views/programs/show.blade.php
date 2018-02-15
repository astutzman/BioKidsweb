@extends('layouts.showtmp')

@section('show_records')

                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Address:</strong></td>
                            <td  class="col-sm-10"> {{ $program->address }}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>City:</strong></td> 
                            <td class="col-sm-10"> {{ $program->city }}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>State:</strong></td>
                            <td class="col-sm-10"> {{ $program->state }}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Zip Code:</strong></td>
                            <td class="col-sm-10"> {{ $program->postal_code }}</td>
                        </tr>
@endsection
@section('show_extra')
                    <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Teachers</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="list-group">
                                            @forelse($program->users as $user)
                                                <a class="list-group-item" href="#">{{ $user['name'] }} </a>
                                            @empty
                                                <span class="text-muted">There are no teachers assigned to this program.</span>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
@endsection
