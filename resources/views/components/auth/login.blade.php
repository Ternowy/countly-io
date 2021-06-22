<div class="container pt-36">
    <home-page google-link="{{ route('auth', ['method' => 'google']) }}"
               facebook-link="{{ route('auth', ['method' => 'facebook']) }}"
               logout-link="{{ route('logout') }}"
               surveys-link="{{ route('surveys') }}"
               logo="{{ url('/images/logo.svg') }}"
               :is-authenticated="{{ Auth::check() ? 'true' : 'false' }}"
    />
</div>
