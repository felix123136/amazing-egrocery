<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-light card p-5">
                <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img
                        class="w-48 mr-6 mb-3 img-fluid"
                        src="{{ asset($user->picture) }}"
                        alt=""
                    />
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
                        <label class="text-muted" for="first_name">@lang('user_edit.first_name')</label>
                        @error('first_name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ $user->last_name }}">
                        <label class="text-muted" for="last_name">@lang('user_edit.last_name')</label>
                        @error('last_name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ $user->email }}">
                        <label class="text-muted" for="email">@lang('user_edit.email')</label>
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="role" name="role" placeholder="role" value="{{ $user->role->name }}" disabled>
                        <label class="text-muted" for="role">@lang('user_edit.role')</label>
                        <input type="hidden" class="form-control" name="role_id" value="{{ $user->role_id }}">
                    </div>
                    <div class="form-group mb-4">
                        <label class="me-3" for="gender">@lang('user_edit.gender')</label>
                        @foreach ($genders as $gender)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender_id" id={{$gender->id}} value={{$gender->id}} {{$user->gender_id == $gender->id ? "checked" : ""}}>
                                <label class="form-check-label" for={{$gender->id}}>{{$gender->description == "Male" ? __('user_edit.male') : __('user_edit.female')}}</label>
                            </div>
                        @endforeach
                        @error('gender_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="picture">@lang('user_edit.display_picture')</label>
                        <input type="file" class="form-control" name="picture">
                        @error('picture')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" value="{{ $user->password }}">
                        <label class="text-muted" for="password">@lang('user_edit.password')</label>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation" value="{{ $user->password }}">
                        <label class="text-muted" for="password_confirmation">@lang('user_edit.password_confirmation')</label>
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center mt-4 d-grid gap-2">
                        <button type="submit" class="btn btn-warning">@lang('user_edit.save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>