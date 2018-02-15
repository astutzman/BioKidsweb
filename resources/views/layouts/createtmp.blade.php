@extends('layouts.index')

@section('nav')
    @include('layouts.nav.index')
@endsection

@section('content')
    @auth
    <!--Teachers Only!! -->
        @if(Auth::user()->role != $template_vars['role']) 
 
            @include('auth.autherrors')

        @else <!-- if you're an Teachers -->
           <div class="container" banner="id">
                <div class="row">
                    <div class="col-lg-8 col-md-7 colsm-6">
                       <h1>New {{$template_vars['title']}}</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">

                        @include('layouts.errors')

                        <form class="records" method="POST" action="/{{strtolower($template_vars['titlepl'])}}">

                            {{ csrf_field() }}

                            @yield('create_fields')

                            <div class="form-group">
                                <button class="primary">Submit</button>
                            </div>
                        </form>
                    </div>
                <div class="col-lg-6">
                    @yield('custom')
                </div>
            </div>
        </div>
        @endif

    @endauth

@endsection

@section('footer')
    @include('layouts.footer')
@endsection