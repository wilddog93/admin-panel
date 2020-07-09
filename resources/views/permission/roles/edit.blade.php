@extends('layouts.back')

@section('content')
    <div class="mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                Edit Role
                <div>
                    <a href=" {{ route('roles.index') }} " class="btn btn-sm btn-secondary d-flex align-items-center">
                        <svg width="18px" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
                        Back
                    </a>
                </div>
            </div>
    
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