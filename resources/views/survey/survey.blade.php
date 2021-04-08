<x-main-layout :title="$survey['name']">
    <survey-preview v-bind="{{ json_encode($survey) }}"/>
</x-main-layout>