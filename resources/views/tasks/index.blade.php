@extends('layouts.app')
@section('content')
<div class="questions">
  @foreach($stages as $stage)
    <h2 class="questions__step questions__step--active js-open-form">{{ $stage->name }}</h2>
    <div>
      <list-tasks
        :tasks-data="{{ json_encode($stage->tasks) }}"
        :templates-data="{{ json_encode($templates) }}"
        :stage-id="{{ json_encode($stage->id) }}"
      ></list-tasks>
    </div>
  @endforeach
</div>
@endsection
