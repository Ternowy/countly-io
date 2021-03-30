<x-app-layout title="surveys">
    <a href="{{ route('builder') }}">Builder</a>

    <x-user.surveys.survey-list :survey-list="$surveys"/>
</x-app-layout>