<x-app-layout title="surveys">
     <survey-list :survey-list="{{ json_encode($surveys) }}" create-survey-link="{{ route('builder') }}"/>
</x-app-layout>