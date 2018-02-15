@extends('layouts.index')

@section('nav')
    @include('layouts.nav.index')
@endsection

@section('content')
    @auth
    <!--Authorized Only!! -->
        @if(Auth::user()->role != $template_vars['role']) 
            
            @include('auth.autherrors')

        @else 
            <div class="container" banner="id">
                <div class="row">
                    <div class="col-lg-8 col-md-7 colsm-6">
                        <h1>Edit {{$template_vars['title']}}</h1>
                    </div>
                </div>
            </div>
                @include('layouts.errors')
            <div class="row">
                <div class="col-lg-6">
                   <div class="well bs-component" banner="id">
                        <form class="form-horizontal" method="POST" action="/{{strtolower($template_vars['titlepl'])}}/{{$template_vars['title_id']}}">
                            <fieldset>
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <input type="hidden" name="id" value="{{ $template_vars['title_id'] }}" />

                                @yield('edit_fields')

                                <div class="form-group">
                                    <button class="btn btn-info primary">Update</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    @yield('custom')
                </div>
            </div>

        @endif

    @endauth

@endsection

@section('footer')
    @include('layouts.footer')
@endsection