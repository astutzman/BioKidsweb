@extends('layouts.createtmp')

@section('create_fields')
                <div class="form-group">
                    <label for="title">Group Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                </div>

                <div class="form-group">
                    <label for="unique_code">Unique Code:</label>
                    <input type="text" class="form-control" name="unique_code" value="{{ old('unique_code') }}" maxlength="8" required />
                    <!--<label for="tracker_id">Tracker:</label>
                    <select class="form-control" name="select">
                        <option>Select one...</option>
                        @foreach($trackers as $tracker)
                            <option name="$tracker->id">
                                {{$tracker->name}}
                            </option>
                        @endforeach
                    -->
                    </select>
                    <label for="description">Description:</label>
                    <textarea rows="4" class="form-control" name="description">{{ old('description') }}</textarea>
                </div>
@endsection