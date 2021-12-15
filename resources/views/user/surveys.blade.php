<x-app-layout title="surveys">
     <base-header
             answers-limit="{{ $answersLimit }}"
             answers-number="{{ $answersNumber }}"
             logo="{{ url('/images/logo.svg') }}"
             logo-uri="{{ route('home') }}"
             user-pic="{{ Auth::user()->avatar }}"
             logout-link="{{ route('logout') }}"
     ></base-header>

     <survey-list
             :survey-list="{{ json_encode($surveys) }}"
             create-survey-link="{{ route('create-survey') }}"
     ></survey-list>
</x-app-layout>