<div class="container pt-36">
    @guest
      <auth-view
        googleLink="{{ route('auth', ['method' => 'google']) }}"
        facebookLink="{{ route('auth', ['method' => 'facebook']) }}"
      />
    @endguest

    @auth
        <a href="{{ route('logout') }}">
            Logout
        </a>
    @endauth
</div>
