<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#navigation-{{ $navigation->id }} ">
    Delete
</button>

<div class="modal fade" id="navigation-{{ $navigation->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Are you sure ?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    {{ $navigation->name }} - <a href="{{ $navigation->url }}">{{ $navigation->url }}</a>
                </div>
                <div class="d-flex justify-content-between">
                    <form action=" {{ route('navigation.delete', $navigation) }} " method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                    <button type="button" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>