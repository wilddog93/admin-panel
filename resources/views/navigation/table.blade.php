@extends('layouts.back')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Table of Navigation</h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Name</th>
                        <th scope="col">URL</th>
                        <th scope="col">Permission Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($navigations as $index => $navigation)
                        <tr>
                            <th scope="row"> {{ $index + 1 }} </th>
                            <td><strong>{{ $navigation->parent->name }}</strong></td>
                            <td> {{ $navigation->name }} </td>
                            <td> {{ $navigation->url }} </td>
                            <td> {{ $navigation->permission_name }} </td>
                            <td>
                                <a href=" # " class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection