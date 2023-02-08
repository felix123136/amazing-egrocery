<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Amazing E-Grocery</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href={{asset('assets/home.css')}} />
    </head>
    <body class="d-flex text-center text-white bg-dark">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
                <div class="container-fluid">
                    <h3>@lang('index.amazing_e_grocery')</h3>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                        class="collapse navbar-collapse"
                        id="navbarNavAltMarkup"
                    >
                        <div class="navbar-nav ms-auto">
                            @auth
                            <a class="nav-link" href="/home"
                                >@lang('index.home')</a
                            >
                            <a class="nav-link" href="/cart"
                                >@lang('index.cart')</a
                            >
                            <a
                                class="nav-link"
                                href="/users/{{auth()->user()->id}}"
                                >@lang('index.profile')</a
                            >
                            @if (auth()->user()->admin_id == 1)
                            <a class="nav-link" href="/account-maintenance"
                                >@lang('index.account_maintenance')</a
                            >
                            @endif
                            <form
                                action="/logout"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf
                                <button class="nav-link">
                                    @lang('index.logout')
                                </button>
                            </form>
                            @else
                            <a class="nav-link" href="/register"
                                >@lang('index.register')</a
                            >
                            <a class="nav-link" href="/login"
                                >@lang('index.login')</a
                            >
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
            <header class="mb-auto"></header>
            <main class="px-3">
                <h1 class="mb-4">@lang('index.amazing_e_grocery')</h1>
                <p class="lead">@lang('index.description')</p>
            </main>
            <footer class="mt-auto text-white-50">
                <p>@lang('index.copyright')</p>
            </footer>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
            integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
