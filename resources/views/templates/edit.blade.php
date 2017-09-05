@extends('layouts.app')

@section('content')
  <section class="create">
    <a href="{{ route('templates.index') }}" class="create__btn btn btn-warning btn-fab">
      <i class="material-icons">
        <img src="{{URL::asset('/img/back.svg')}}" alt="">
      </i>
    </a>
    <div class="create__wrapper">
      @if (session('status'))
        <div class="alert alert-success create__alert-edit">
          {{ session('status') }}
        </div>
      @endif

      <template-name
          :name-data="{{ json_encode($template->name) }}"
          :id-data="{{ json_encode($template->id) }}"
      ></template-name>

      @foreach($stages as $stage)
        <div class="col-md-12">
          <b>{{ ($stage->name) }}</b>
        </div>
        <div class="col-md-12">Задачи</div>
        {{--<template-list-tasks--}}
        {{--:tasks-data="{{ json_encode($stage->tasks) }}"--}}
        {{--></template-list-tasks>--}}
        @foreach($stage->tasks as $task)

          <template-task
              :task-data="{{ json_encode($task) }}"
              :active-data="{{ json_encode($task->isActive($template->id)) }}"
          ></template-task>

          {{--<div class="col-md-12" style="display: flex; margin-left: 15px;">--}}
          {{--{{ dd($task->isActive($template->id)) }}--}}
{{--          <input name="checkbox" type="checkbox" @if ($task->isActive($template->id)) checked="checked" @endif>--}}
          {{--<div style="margin-left: 5px">{{ $task->name }}</div>--}}
          {{--</div>--}}
          {{--@foreach($task->variants as $variant)--}}
          {{--<div style="margin-left: 45px;">--}}
          {{--{{ $variant->name }}--}}
          {{--<input type="number" placeholder="Время (ч)" style="margin-left: 10px; width: 80px;">--}}
          {{--</div>--}}
          {{--@endforeach--}}
        @endforeach
      @endforeach


    </div>
  </section>
@endsection