@extends('layouts.edittmp')

@section('edit_fields')
                            <div class="form-group">
                                <label for="title">Program Name:</label>
                                <input type="text" id="nameField" class="form-control" name="program" value="{{$program['program']}}" required />
                            </div>

                            <div class="form-group">
                                <label for="body">Street Address:</label>
                                <input v-model="mapadr" id="streetField" type="text" class="form-control" name="address" locdata="{{ $program['address'] }}" required />
                           </div>

                            <div class="form-group">                                
                                <label for="city">City:</label>
                                <input v-model="mapcity" id="cityField" type="text" class="form-control" name="city" locdata="{{ $program['city'] }}" required />
                           </div>

                            <div class="form-group">                                
                                <label for="state">State:</label>
                                <input v-model="mapstate" id="stateField" type="text" class="form-control" name="state" locdata="{{ $program['state'] }}"maxlength="2" size="4" required />
                           </div>

                            <div class="form-group">                                
                                <label for="postal_code">Zip Code:</label>
                                <input name="postal_code" v-model="mapzip" id="zipField" type="text" class="form-control" locdata="{{ $program['postal_code'] }}" required />
                            </div>
                            <input v-model="maplng" type="hidden" id="lngField" class="form-control" name="longitude" locdata="{{ $program->longitude }}" />

                             <input v-model="maplat" type="hidden" id="latField" class="form-control" name="latitude" locdata="{{ $program->latitude }}"  />

@endsection

@section('custom')
    <div id="map" class="map-program"></div>

@endsection
