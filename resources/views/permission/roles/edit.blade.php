@extends('layouts.back')

@section('content')
    <div class="mb-4">
        <div class="card">
            <div class="card-header">Edit Role</div>
    
            <div class="card-body">
                <form action="{{ route('roles.edit', $role) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('permission.roles.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection