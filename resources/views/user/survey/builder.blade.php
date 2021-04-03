<x-app-layout title="builder">
    <div id="app">
        <survey-builder create-survey-uri="{{ route('create-survey') }}"
                        home-uri="{{ route('surveys') }}"
                        user-pic="{{ auth()->user()->avatar }}"
                        mode="create"
        />
    </div>
</x-app-layout>