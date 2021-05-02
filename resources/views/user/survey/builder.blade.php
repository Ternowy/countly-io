<x-app-layout title="builder">
    <survey-builder
      v-bind="{{ json_encode($builderConfig) }}"
      logo="{{ url('/images/logo.svg') }}"
    />
</x-app-layout>
