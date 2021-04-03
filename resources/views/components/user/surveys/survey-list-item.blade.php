<div>
    {{ $survey['name'] }}
    {{ $survey['status'] }}
    {{ $getAccessLink() }}
    <a href="{{ route('edit-survey', ['id' => $survey['id']]) }}">Edit</a>
</div>