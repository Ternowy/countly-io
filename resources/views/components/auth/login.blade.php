<div class="container pt-36">
    @guest
//         <a href="{{ route('auth', ['method' => 'google']) }}">
//             Continue with Google
//         </a>
//
//         <a href="{{ route('auth', ['method' => 'facebook']) }}">
//             Continue with Facebook
//         </a>
      <auth-view />
    @endguest

    @auth
        <a href="{{ route('logout') }}">
            Logout
        </a>
    @endauth
</div>
