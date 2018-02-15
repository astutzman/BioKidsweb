@extends('layouts.showtmp')

@section('show_records')
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Email:</strong></td>
                            <td  class="col-sm-10"> {{ $teacher->email }}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Program:</strong></td>
                            <td  class="col-sm-10"> {{ $teacher->programs->program }}</td>
                        </tr> 
@endsection
                
@section('show_extra')

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Locations</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        @forelse($teacher->locations as $location)
                                            <span class="list-group-item">{{$location->name}}</span>
                                        @empty
                                            <span class="text-muted">There are no locations for this teacher.</span>
                                        @endforelse 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Groups</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        @forelse($teacher->groups as $group)
                                            <span class="list-group-item">{{$group->name}}</span>
                                        @empty
                                            <span class="text-muted">There are no groups for this teacher.</span>
                                        @endforelse                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection