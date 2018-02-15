@extends('layouts.createtmp')

@section('create_fields')

                <div class="form-group">
                    <label for="title">Location Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                </div>
                <div class="text-info">Please enter your address in the form below, or select a location on the map.</div>
                <div class="form-group">
                    <label for="body">Street Address:</label>
                    <input id="addressField" v-model="mapadr" type="text" class="form-control" name="address" value="{{ old('address') }}" required />
                    <label for="body">City:</label>
                    <input id="cityField" v-model="mapcity" type="text" class="form-control" name="city" value="{{ old('city') }}" required />
                    <label for="body">State:</label>
                    <input id="stateField" v-model="mapstate" type="text" class="form-control" name="state" value="{{ old('state') }}" maxlength="2" size="4" required />
                    <label for="body">Zip Code:</label>
                    <input id="zipField" v-model="mapzip" type="text" class="form-control" name="postal_code" value="{{ old('postal_code') }}" required />
                </div>
                <div class="form-group">              
                    <label for="body">Description:</label>
                    <textarea rows="4" class="form-control" name="description">{{ old('description') }}</textarea>
                    <input type="hidden" v-model="maplng" id="lngField" class="form-control" name="longitude" value="{{ old('longitude') }}"/>
                    <input type="hidden" v-model="maplat" id="latField" class="form-control" name="latitude" value="{{ old('latitude') }}"/>
                </div>
@endsection

@section('custom')
    <div class="text-info">Scroll and zoom on the map to find your location.  Tap the screen to add a marker.</div>
    <div id="map" class="map-program" ></div>

@endsection