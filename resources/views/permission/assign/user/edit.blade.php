@extends('layouts.back')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-multi').select2({
                placeholder: "Select Roles"
            });
            $('.select2-single').select2();
        });
    </script>
@endpush

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        Sync Roles for {{ $user->name }}
        <div>
            <a href=" {{ route('assign.user.create') }} " class="btn btn-sm btn-secondary d-flex align-items-center">
                <svg width="18px" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
                Back
            </a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('assign.user.edit', $user) }}" method="post">
            @method("PUT")
            @csrf
            <div class="form-group">
                <label for="email">User Email</label>
                <select name="email" id="email" class="select2-single select-custom form-control">
                    <option disabled selected>Find user email</option>
                    @foreach ($users as $user_email)
                        <option {{ $user->id == $user_email->id ? 'selected' : '' }} value="{{ $user_email->id }}">{{ $user_email->email }}</option>
                    @endforeach
                </select>
                @error('email')
                    <div class="text-danger mt-2"> {{ $message }} </div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="roles">Roles</label>
                <select name="roles[]" id="roles" class="select2-multi select-custom form-control" multiple>
                    @foreach ($roles as $role)
                        <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('roles')
                    <div class="text-danger mt-2"> {{ $message }} </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Sync</button>
        </form>
    </div>
</div>
@endsection