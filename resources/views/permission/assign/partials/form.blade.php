<div class="form-group">
    <label for="role">Role Name</label>
    <select name="role" id="role" class="select2-single select-custom form-control">
        <option disabled selected>Choose a role!</option>
        @foreach ($roles as $item)
            <option {{ $role->id == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->name }}</option>
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
            <option {{ $role->permissions()->find($permission->id) ? "selected" : "" }} value="{{ $permission->id }}">{{ $permission->name }}</option>
        @endforeach
    </select>
    @error('permissions')
        <div class="text-danger mt-2"> {{ $message }} </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary"> {{ $submit ?? "Assign" }} </button>