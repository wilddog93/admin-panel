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
            @include('permission.assign.user.partials.form')
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
                    <th scope="col">Name</th>
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