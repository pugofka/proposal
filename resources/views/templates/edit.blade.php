@extends('layouts.app')

@section('content')
  <section class="templates__edit-section">
    <a href="{{ route('templates.index') }}" class="btn__back btn btn-warning btn-fab">
      <i class="material-icons">
        <img src="{{URL::asset('/img/back.svg')}}" alt="">
      </i>
    </a>
    <div class="templates__edit-wrapper">
      @if (session('status'))
        <div class="alert alert-success create__alert-edit">
          {{ session('status') }}
        </div>
      @endif

      <template-name
          :name-data="{{ json_encode($template->name) }}"
          :id-data="{{ json_encode($template->id) }}"
      ></template-name>

    </div>

    @foreach($stages as $stage)
      <div class="row">
        <div class="col-md-12">
          <h2>{{ ($stage->name) }}</h2>
        </div>
      </div>
      @foreach($stage->tasks as $task)
        <div class="templates__edit-wrapper">
          <template-task
              :task-data="{{ json_encode($task) }}"
              :active-data="{{ json_encode($task->isActive($template->id)) }}"
              :template-id="{{ json_encode($template->id) }}"
              :variants-data="{{ json_encode($task->variants) }}"
          ></template-task>
        </div>
      @endforeach
    @endforeach


  </section>
@endsection