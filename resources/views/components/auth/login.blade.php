<div class="container pt-36">
    @guest
      <auth-view
        google-link="{{ route('auth', ['method' => 'google']) }}"
        facebook-link="{{ route('auth', ['method' => 'facebook']) }}"
      />
    @endguest

    @auth
        <a href="{{ route('logout') }}">
            Logout
        </a>
    @endauth
</div>
