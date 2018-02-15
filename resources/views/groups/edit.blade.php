@extends('layouts.edittmp')

@section('edit_fields')
                                <div class="form-group">
                                    <label for="name">Group Name:</label>
                                    <input type="text" class="form-control" name="name" value="{{$group->name}}" required />
                                </div>

                                <div class="form-group">
                                    <label for="unique_code">Unique Code:</label>
                                    <input type="text" class="form-control" name="unique_code" value="{{ $group->unique_code }}" maxlength="8" required />
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea rows="4" class="form-control" name="description"> 
                                        {{ $group->description }} 
                                    </textarea>                  
                                </div>
@endsection