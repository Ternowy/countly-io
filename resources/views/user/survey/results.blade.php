<x-app-layout :title="'Results | ' . $survey['name']">
    <survey-results :survey="{{ json_encode($survey) }}" :results="{{ json_encode($results) }}"/>
</x-app-layout>