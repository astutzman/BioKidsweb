@extends('layouts.showtmp')

@section('show_records')
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Address:</strong></td>
                            <td  class="col-sm-10"> {{ $location->address }}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>City:</strong></td> 
                            <td class="col-sm-10"> {{ $location->city }}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>State:</strong></td>
                            <td class="col-sm-10"> {{ $location->state }}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Zip Code:</strong></td>
                            <td class="col-sm-10"> {{ $location->postal_code }}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Longitude:</strong></td>
                            <td class="col-sm-10"> {{ $location->longitude }}</td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Latitude:</strong></td>
                            <td class="col-sm-10"> {{ $location->longitude }}</td>
                        </tr> 
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Description:</strong></td>
                            <td class="col-sm-10"> {{ $location->description }}</td>
@endsection