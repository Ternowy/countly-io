<x-app-layout title="builder">
    <div id="app">
        <survey-builder v-bind="{{ json_encode($builderConfig) }}"/>
    </div>
</x-app-layout>