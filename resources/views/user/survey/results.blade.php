<x-app-layout :title="'Results | ' . $survey['name']">
    <base-header
            answers-limit="{{ $answersLimit }}"
            answers-number="{{ $answersNumber }}"
            logo="{{ url('/images/logo.svg') }}"
            logo-uri="{{ route('surveys') }}"
            user-pic="{{ Auth::user()->avatar }}"
            logout-link="{{ route('logout') }}"
    ></base-header>

    <survey-results :survey="{{ json_encode($survey) }}" :results="{{ json_encode($results) }}"/>
</x-app-layout>