@extends('layouts.index')

@section('nav')
    @include('layouts.nav.index')
@endsection

@section('content')

<div class="row">


<h3 style="padding:10px;">Student Observations</h3>

    <div class="container">
        <div>
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="{{ url('observations') }}">Data</a></li>
              <li class="page-item"><a class="page-link" href="{{ url('observations/maps') }}">Map</a></li>
              <li class="page-item active"><a class="page-link" href="#">Charts</a></li>
            </ul>
      </div>

    <h4>Number of Observations by Type</h4>

            <table class="table table-striped table-bordered table-hover">
            <!--TABLE COLUMN HEADERS -->
                <tr class="table-primary text-center">
                    <th class="text-center">Species</th>
                    <th class="text-left">Animal Type</th>
            <!-- RETRIEVE THE GROUP/ZONE NAMES -->
                @foreach($programs as $program)
                    @if($observations->where('program_id', $program->id)->count())
                    <th>{{$program->program}}</th>
                    @endif
                @endforeach
                    <th>Micro Habitat</th>
                    <!--<th style="padding-right:40px;" width="20%" class="bg-info">Abundance By Species</th> -->
                </tr> 

            <!-- TOTAL FOR EACH TYPE AND ZONE -->
            @foreach ($observations->unique('species')->sortBy('species') as $type)
                @if ($observations->where('type', $type->type)->count())
                <tr>
                    <td class="text-capitalize">{{$type->species}}</td>
                    <td>
                        @if($type->type == $type->species)
                            &nbsp;
                        @else
                            {{$type->type}}
                        @endif
                    </td>                    
            <!-- GET THE TOTAL OF EACH TYPE PER GROUP/ZONE -->
                @foreach($programs as $program)
                    @if($observations->where('program_id', $program->id)->count())
                    <td class="text-center">{{$observations->where('species', $type->species)->where('program_id', $program->id)->sum('howManySeen')}}
                    </td>
                    @endif
                @endforeach
            <!-- ALL ANIMAL POSITIONS -->
                    <td class="text-center">
                        @foreach($observations->where('type', $type->type)->unique('position') as $position)
                        <span>{{$position->position}}</span><br />
                        @endforeach
                    </td>
            <!-- TOTAL ABUNDANCE PER TYPE -->
                   <!-- <td style="color:black;padding-right:40px;" class="table-info font-weight-bold text-center">{{$observations->where('species', $type->species)->sum('howManySeen')}}</td>
                   -->
                </tr>
                @endif
            @endforeach
                <tr style="border-top:20px solid #ffffff;" class="font-weight-bold">
                    <td class="bg-secondary">Total Abundance:</td>
                    <td class="bg-light">&nbsp;</td>
                @foreach($programs as $program)
                    @if($observations->where('program_id', $program->id)->count())                
                    <td class="bg-light text-center">{{$observations->where('program_id', $program->id)->sum('howManySeen')}}</td>
                    @endif
                @endforeach
                    <td style="font-size:1.1em; padding-right:40px;" class="bg-primary text-white font-weight-bolder text-center">{{$observations->sum('howManySeen')}}</td>
                </tr>
                <tr class="font-weight-bold">
                    <td class="bg-secondary">Total Richness:</td>
                    <td class="bg-light">&nbsp;</td>
                @foreach($programs as $program)
                    @if($observations->where('program_id', $program->id)->count())
                    <td class="text-center bg-light">{{$observations->where('program_id', $program->id)->count()}}</td>
                    @endif
                @endforeach
                    <td style="font-size:1.1em; padding-right:40px;" class="bg-primary text-white font-weight-bolder text-center">{{$observations->count()}}</td>
                </tr>
            </table>

    </div>
            

</div>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection