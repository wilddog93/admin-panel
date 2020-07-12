@extends('layouts.back')

@section('content')
    <div class="card">
        <div class="card-header">Table of Category</div>

        <div class="card-body">
            @auth
               Hi, {{ auth()->user()->name }}
            @endauth
        </div>
    </div>
@endsection