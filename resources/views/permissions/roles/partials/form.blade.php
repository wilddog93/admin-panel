<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') ?? $role->name }}" class="form-control">
</div>
<div class="form-group">
    <label for="guard_name">Guard Name</label>
    <input type="text" name="guard_name" id="guard_name" value="{{ old('guard_name') ?? $role->guard_name }}" placeholder='default is "web"' class="form-control">
</div>
<button type="submit" class="btn btn-primary">{{ $submit ?? 'Create' }}</button>