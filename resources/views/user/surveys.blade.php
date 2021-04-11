<x-app-layout title="surveys">
     <survey-list :survey-list="{{ json_encode($surveys) }}" create-survey-link="{{ route('create-survey') }}"/>
</x-app-layout>