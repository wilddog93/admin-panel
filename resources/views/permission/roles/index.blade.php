@extends('layouts.back')

@section('content')
    <div class="mb-4">
        <div class="card">
            <div class="card-header">Create new Role</div>
    
            <div class="card-body">
                <form action=" {{ route('roles.create') }} " method="post">
                    @csrf
                    @include('permission.roles.partials.form')
                </form>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <div class="card">    
            <div class="card-body">
                <h5 class="card-title">Table of Roles</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Guard name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $index => $role)
                            <tr>
                                <th scope="row"> {{ $index + 1 }} </th>
                                <td> {{ $role->name }} </td>
                                <td> {{ $role->guard_name }} </td>
                                <td> {{ $role->created_at->format('d F, Y') }} </td>
                                <td>
                                    <a href=" {{ route('roles.edit', $role) }} " class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection