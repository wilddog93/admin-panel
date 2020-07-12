@extends('layouts.back')

@section('content')
    <div class="card">
        <div class="card-header">Create new Navigation</div>

        <div class="card-body">
            <form action=" {{ route('navigation.edit', $navigation) }} " method="post">
                @method("PUT")
                @csrf
                @include('navigation.partials.form')
            </form>
        </div>
        @include('navigation.delete', ['naveigation' => 'navigation'])
    </div>
@endsection