<div>
    @forelse ($surveyList as $survey)
        <x-user.surveys.survey-list-item :survey="$survey"/>
    @empty
        <p>Nothing to show</p>
    @endforelse
</div>