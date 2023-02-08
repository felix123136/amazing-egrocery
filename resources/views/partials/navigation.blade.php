<nav class="navbar navbar-expand-lg navbar-light sticky-top ps-5 pe-4" style="background-color:aquamarine;">
  <a class="navbar-brand" href="/">Amazing E-Grocery</a>
  <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
  >
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item active me-3">
              <a class="nav-link" href="/home">{{ __('navigation.home') }}</a>
            </li>
            <li class="nav-item active me-3">
              <a class="nav-link" href="/cart">{{ __('navigation.cart') }}</a>
            </li>
            <li class="nav-item active me-3">
              <a class="nav-link" href="/users/{{auth()->user()->id}}">{{ __('navigation.profile') }}</a>
            </li>
            @if (auth()->user()->role_id == 1)
              <li class="nav-item active me-3">
                <a class="nav-link" href="/account-maintenance">{{ __('navigation.account_maintenance') }}</a>
              </li>
            @endif
            <li class="nav-item active me-3">
              <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger">{{ __('navigation.logout') }}</button>
              </form>
            </li>
          @else
            <li class="nav-item active me-3">
              <a class="nav-link" href="/register">{{ __('navigation.register') }}</a>
            </li>
            <li class="nav-item active me-3">
              <a class="nav-link" href="/login">{{ __('navigation.login') }}</a>
            </li>
          @endauth
        </ul>
    </div>
</nav>
