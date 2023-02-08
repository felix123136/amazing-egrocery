<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-light card p-5">
                <h2 class="text-center mb-4">@lang('register.register')</h2>
                <form method="POST" action="/users" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" autofocus>
                        <label class="text-muted" for="first_name">@lang('register.first_name')</label>
                        @error('first_name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                        <label class="text-muted" for="last_name">@lang('register.last_name')</label>
                        @error('last_name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}">
                        <label class="text-muted" for="email">@lang('register.email')</label>
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <select class="form-control" name="role_id">
                            <option value="">@lang('register.select_role')</option>
                            @foreach ($roles as $role)
                                <option value={{$role->id}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="me-3" for="gender">@lang('register.gender')</label>
                        @foreach ($genders as $gender)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender_id" id={{$gender->id}} value={{$gender->id}}>
                                <label class="form-check-label" for={{$gender->id}}>{{$gender->description == "Male" ? __('register.male') : __('register.female')}}</label>
                            </div>
                        @endforeach
                        @error('gender_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="mb-3" for="picture">@lang('register.display_picture')</label>
                        <input type="file" class="form-control" name="picture">
                        @error('picture')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" value="{{ old('password') }}">
                        <label class="text-muted" for="password">@lang('register.password')</label>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation" value="{{ old('password_confirmation') }}">
                        <label class="text-muted" for="password_confirmation">@lang('register.password_confirmation')</label>
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center mt-4 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">@lang('register.submit')</button>
                    </div>
                    <div class="text-center mt-4">
                        @lang('register.already_have_account') 
                        <a class="link-primary" href="/login">@lang('register.login')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>