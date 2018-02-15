@extends('layouts.edittmp')

@section('edit_fields')
                            

                <div class="form-group">
                    <label for="name">Location Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$location->name}}" required />
                </div>

                <div class="form-group">
                    <label for="address">Street Address:</label>
                    <input v-model="mapadr" type="text" id="streetField" class="form-control" name="address" locdata="{{ $location->address }}" value required />
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input v-model="mapcity" type="text" id="cityField" class="form-control" name="city" locdata="{{ $location->city }}" value required />
                </div>

                <div class="form-group">                                
                    <label for="state">State:</label>
                    <input v-model="mapstate" type="text" id="stateField" class="form-control" name="state" locdata="{{ $location->state }}" maxlength="2" size="4" value required />
                </div>
                
                <div class="form-group">                                
                    <label for="postal_code">Zip Code:</label>
                    <input v-model="mapzip" type="text" id="zipField" class="form-control" name="postal_code" locdata="{{ $location->postal_code }}" value required />
                </div>

                <div class="form-group">                                
                    <label for="description">Description:</label>
                    <textarea rows="4" class="form-control" name="description"> 
                        {{ $location->description }} 
                    </textarea>                  
                </div>
                <input v-model="maplng" type="hidden" id="lngField" class="form-control" name="longitude" locdata="{{ $location->longitude }}" />

                    <input v-model="maplat" type="hidden" id="latField" class="form-control" name="latitude" locdata="{{ $location->latitude }}"  />
@endsection

@section('custom')
    <div id="map" class="map-program"></div>

@endsection