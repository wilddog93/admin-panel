<div>
    @can('create post')
        <div class="mb-5">
            <small class="d-block text-secondary text-uppercase mb-2">Post</small>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                    Create post
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Data table post
                </a>
            </div>
        </div>        
    @endcan

    @can('create category')    
        <div class="mb-5">
            <div class="list-group">
                <small class="d-block text-secondary text-uppercase mb-2">Categories</small>
                <a href="#" class="list-group-item list-group-item-action">
                    Create category
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Data table category
                </a>
            </div>
        </div>
    @endcan

    @can('show user')
        <div class="mb-5">
            <div class="list-group">
                <small class="d-block text-secondary text-uppercase mb-2">Users</small>
                <a href="#" class="list-group-item list-group-item-action">
                    Create user
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Data table user
                </a>
            </div>
        </div>
    @endcan

    @can('assign permission')
        <div class="mb-5">
            <div class="list-group">
                <small class="d-block text-secondary text-uppercase mb-2">Role & Permission</small>
                <a href=" {{ route('roles.index') }} " class="list-group-item list-group-item-action">Roles</a>
                <a href=" {{ route('permissions.index') }} " class="list-group-item list-group-item-action">Permissions</a>
                <a href="{{ route('assign.create') }}" class="list-group-item list-group-item-action">Assign Permissions</a>
            </div>
        </div>
    @endcan

    <div class="mb-5">
        <div class="list-group">
            <small class="d-block text-secondary text-uppercase mb-2">Logout</small>
            <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>