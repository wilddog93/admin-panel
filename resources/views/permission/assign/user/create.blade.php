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
    <div class="card-header">Assign Roles to User</div>

    <div class="card-body">
        <form action="{{ route('assign.user.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">User Email</label>
                <select name="email" id="email" class="select2-single select-custom form-control">
                    <option disabled selected>Find user email</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
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
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('roles')
                    <div class="text-danger mt-2"> {{ $message }} </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Table of User roles</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">The roles</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <th scope="row"> {{ $index + 1 }} </th>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ implode(', ', $user->getRoleNames()->toArray()) }} </td>
                        <td>
                            <a href=" {{route('assign.user.edit', $user)}} " class="btn btn-sm btn-primary">Sync</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection