@extends('layouts.createtmp')

@section('create_fields')
                <div class="form-group">
                    <label for="title">Program Name:</label>
                    <input type="text" class="form-control" name="program" required />
                </div>

                <div class="form-group">
                    <label for="body">Street Address:</label>
                    <input v-model="mapadr" type="text" class="form-control" name="address" required />
                    <label for="body">City:</label>
                    <input v-model="mapcity" type="text" class="form-control" name="city" value="Philadelphia" required />
                    <label for="body">State:</label>
                    <input v-model="mapstate" type="text" class="form-control" name="state" value="PA" maxlength="2" size="4" required />
                    <label for="body">Zip Code:</label>
                    <input v-model="mapzip" type="text" class="form-control" name="postal_code" required />
                </div>
@endsection
@section('custom')
    <div class="text-info">Scroll and zoom on the map to find your Program.  Tap the screen to add a marker.</div>
    <div id="map" class="map-program" ></div>

@endsection