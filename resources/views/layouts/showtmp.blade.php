@extends('layouts.index')

@section('nav')
    @include('layouts.nav.index')
@endsection


@section('content')

    @auth
    <!--Teachers Only!! -->
        @if(Auth::user()->role != $template_vars['role']) 
            
            @include('auth.autherrors')

        @else <!-- if you're an Teacher -->
            <div class="container" banner="id">
                <div class="row">
                    <div class="col-lg-8 col-md-7 colsm-6">
                        <h1>{{ $template_vars['title']}}</h1>
                    </div>
                </div>

                <div class="well records">
                    <div class="h3">{{ $template_vars['name'] }}</div>
                    <table class="table table-bordered">
                        @yield('show_records')                                          
                    </table>

                    @yield('show_extra')

                    <div class="row">
                            <div class="col-sm-12">
                                <a href="/{{ strtolower($template_vars['titlepl'])}}/{{ $template_vars['title_id'] }}/edit" class="btn btn-primary">Edit</a>
                            </div>
                    </div>

                </div>
            </div>
        @endif

    @endauth

@endsection

@section('footer')
    @include('layouts.footer')
@endsection