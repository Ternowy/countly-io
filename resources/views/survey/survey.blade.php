<x-main-layout :title="$survey['name']">
    <survey-preview v-bind="{{ json_encode($survey) }}" home-uri="{{ route('home') }}"/>
</x-main-layout>