@extends('layouts.app')

@section('content')
    <div class="questions">
        @foreach($stages as $stage)
            <div>
                <h2 class="questions__step questions__step--active js-open-form">{{ $stage->name }}</h2>
                <div class="js-open-form-pan">
                    <list-tasks
                        :tasks-data="{{ json_encode($stage->tasks) }}"
                        :templates-data="{{ json_encode($templates) }}"
                        :stage-id="{{ json_encode($stage->id) }}"
                    />
                </div>
            </div>
        @endforeach
    </div>
@endsection
