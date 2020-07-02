@extends('layouts.back')

@section('content')
    <div class="mb-4">
        <div class="card">
            <div class="card-header">Create new Permissions</div>
    
            <div class="card-body">
                <form action=" {{ route('permissions.create') }} " method="post">
                    @csrf
                    @include('permission.permissions.partials.form')
                </form>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <div class="card">    
            <div class="card-body">
                <h5 class="card-title">Table of Permissions</h5>
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
                        @foreach ($permissions as $index => $permission)
                            <tr>
                                <th scope="row"> {{ $index + 1 }} </th>
                                <td> {{ $permission->name }} </td>
                                <td> {{ $permission->guard_name }} </td>
                                <td> {{ $permission->created_at->format('d F, Y') }} </td>
                                <td>
                                    <a href=" {{ route('permissions.edit', $permission) }} " class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection