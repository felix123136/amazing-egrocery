<x-layout>
    <div class="container p-5 rounded mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto bg-light card p-5">
                <h2 class="text-center mb-4">@lang('login.login')</h2>
                <form method="POST" action="/users/authenticate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}" autofocus>
                        <label class="text-muted" for="email">@lang('login.email')</label>
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" value="{{ old('password') }}">
                        <label class="text-muted" for="password">@lang('login.password')</label>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center mt-4 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">@lang('login.submit')</button>
                    </div>
                    <div class="text-center mt-4">
                        @lang('login.no_account')
                        <a class="link-primary" href="/register">@lang('login.sign_up')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>