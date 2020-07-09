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
            @include('permission.assign.partials.form')
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Table of Assign Roles & Permissions</h5>
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
                            <a href=" {{ route('assign.edit', $role) }} " class="btn btn-sm btn-primary">Sync</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection