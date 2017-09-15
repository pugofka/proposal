@extends('layouts.app')

@section('content')

    @component('components.well')
        @slot('type') templates @endslot
        @slot('title') Редактирование шаблона @endslot

        <div>
            <template-name
                :name-data="{{ json_encode($template->name) }}"
                :id-data="{{ json_encode($template->id) }}"
            />
        </div>

        @foreach($stages as $stage)
            @if (isset($stage->tasks) && !$stage->tasks->isEmpty())
                <h3>{{ $stage->name }}</h3>

                @foreach($stage->tasks as $task)
                    <div>
                        <template-task
                            :task-data="{{ json_encode($task) }}"
                            :active-data="{{ json_encode($task->isActive($template->id)) }}"
                            :template-id="{{ json_encode($template->id) }}"
                            :variants-data="{{ json_encode($task->variants) }}"
                        />
                    </div>
                @endforeach
            @endif
        @endforeach
    @endcomponent

@endsection
