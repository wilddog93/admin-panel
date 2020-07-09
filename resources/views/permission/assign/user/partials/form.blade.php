<div class="form-group">
    <label for="email">User Email</label>
    <select name="email" id="email" class="select2-single select-custom form-control">
        <option disabled selected>Find user email</option>
        @foreach ($users as $user_email)
            <option {{ $user->id == $user_email->id ? 'selected' : '' }} value="{{ $user_email->id }}">{{ $user_email->email }}</option>
        @endforeach
    </select>
    @error('email')
        <div class="text-danger mt-2"> {{ $message }} </div>
    @enderror
</div>

<div class="form-group">
    <label for="roles">Roles</label>
    <select name="roles[]" id="roles" class="select2-multi select-custom form-control" multiple>
        @foreach ($roles as $role)
            <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    @error('roles')
        <div class="text-danger mt-2"> {{ $message }} </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary"> {{ $submit ?? 'Assign' }} </button>