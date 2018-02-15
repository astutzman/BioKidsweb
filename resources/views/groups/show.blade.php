@extends('layouts.showtmp')

@section('show_records')
 
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Unique Code:</strong></td>
                            <td  class="col-sm-10"> {{ $group->unique_code }}<p class="text-muted">Students can use this code to register their group on the iPad app.</p></td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-primary"><strong>Description:</strong></td> 
                            <td class="col-lg-10"> {{ $group->description }}</td>
                        </tr>
 
@endsection
