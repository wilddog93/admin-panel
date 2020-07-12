<div>
    @foreach ($navigations as $navigation)
        @can($navigation->permission_name)
            <div class="mb-5">
                <div class="list-group">
                    <small class="d-block text-secondary text-uppercase mb-2">{{ $navigation->name }}</small>
                    @foreach ($navigation->children as $child)
                        <a href=" {{ url($child->url) }} " class="list-group-item list-group-item-action"> {{ $child->name }} </a>
                    @endforeach
                </div>
            </div>
        @endcan
    @endforeach

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