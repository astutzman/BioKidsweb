@extends('layouts.edittmp')

@section('edit_fields')
                            <div class="form-group">
                                <label for="title">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{$teacher['name']}}" required />
                            </div>

                            <div class="form-group">
                                <label for="body">Email Address:</label>
                                <input type="text" class="form-control" name="email" value="{{ $teacher['email'] }}" required />
                           </div>

                            <div class="form-group">
                                <label for="body">Program:</label>
                                <select class="form-control" name="program_id">
                                    <option value="{{ $teacher->program_id }}">{{$teacher->programs->program}}</option>
                                </select>
                           </div>
@endsection