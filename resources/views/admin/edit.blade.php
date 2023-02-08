<x-layout>
    <div class="p-5" style="margin-bottom: 32vh;">
        <h4>{{ $user->first_name }}</h4>
        <div class="row mt-4">
            <div class="col-md-4">
                <form action="/account-maintenance/{{$user->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="mb-2" for="role_id">{{__('admin_edit.role')}}:</label>
                    <div class="form-group">
                        <select class="form-control" name="role_id" id="role_id">
                            @foreach ($roles as $role)
                                <option value={{$role->id}} {{$role->id == $user->role_id ? "selected" : ""}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-warning">{{__('admin_edit.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>