@extends('layouts.base')

@section('body')
    <div class="container-fluid">
        <div class="row py-3">
            <div class="col-md-3">
                <x-layouts.sidebar/>
            </div>

            <div class="col-md-9">
                <div class="mt-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection