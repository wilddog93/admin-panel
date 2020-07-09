@extends('layouts.back')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-multi').select2({
                placeholder: "Select permissions"
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
    <div class="card-header">Assign Permissions</div>

    <div class="card-body">
        <form action="{{ route('assign.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="role">Role Name</label>
                <select name="role" id="role" class="select2-single select-custom form-control">
                    <option disabled selected>Choose a role!</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <div class="text-danger mt-2"> {{ $message }} </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="permissions">permissions Name</label>
                <select name="permissions[]" id="permissions" class="select2-multi select-custom form-control" multiple>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
                @error('permissions')
                    <div class="text-danger mt-2"> {{ $message }} </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Table of Table of Roles & Permissions</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Guard name</th>
                    <th scope="col">The permissions</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $index => $role)
                    <tr>
                        <th scope="row"> {{ $index + 1 }} </th>
                        <td> {{ $role->name }} </td>
                        <td> {{ $role->guard_name }} </td>
                        <td> {{ implode(', ', $role->getPermissionNames()->toArray()) }} </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection