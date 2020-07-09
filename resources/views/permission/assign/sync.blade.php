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
    <div class="card-header d-flex justify-content-between align-items-center">
        Sync Permissions
        <div>
            <a href=" {{ route('assign.create') }} " class="btn btn-sm btn-secondary d-flex align-items-center">
                <svg width="18px" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
                Back
            </a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('assign.edit', $role) }}" method="post">
            @method("PUT")
            @csrf
            @include('permission.assign.partials.form')
        </form>
    </div>
</div>
@endsection