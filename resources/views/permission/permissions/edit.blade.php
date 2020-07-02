@extends('layouts.back')

@section('content')
    <div class="mb-4">
        <div class="card">
            <div class="card-header">Edit Permissions</div>
    
            <div class="card-body">
                <form action="{{ route('permissions.edit', $permission) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('permission.permissions.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection