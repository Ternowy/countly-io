<div>
    @guest
        <a href="{{ route('auth', ['method' => 'google']) }}">
            Continue with Google
        </a>

        <a href="{{ route('auth', ['method' => 'facebook']) }}">
            Continue with Facebook
        </a>
    @endguest

    @auth
        <a href="{{ route('logout') }}">
            Logout
        </a>
    @endauth
</div>