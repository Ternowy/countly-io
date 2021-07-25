<x-main-layout :title="$survey['name']">
    <base-loader image="{{ url('/images/logo.svg') }}"></base-loader>
    <div class="w-full flex items-center justify-center align-middle">
        <div class="lg:w-4/12 md:w-6/12 sm:w-full my-5 px-1">
            <survey-preview v-bind="{{ json_encode($survey) }}"
                            home-uri="{{ route('home') }}"
            ></survey-preview>
        </div>
    </div>
</x-main-layout>