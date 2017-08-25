@extends('layouts.app')

@section('content')
  <section class="create">
    <a href="javascript:void(0)" class="create__btn btn btn-warning btn-fab"><i class="material-icons"><img src="http://localhost/img/back.svg" alt=""></i></a>
    <div class="create__wrapper">
    {{--<form class="create__form form-horizontal">--}}
    {{ Form::open(['url' => route('stages.store'), 'class' => 'create__form form-horizontal']) }}
    <fieldset>
      <legend>Создание нового этапа</legend>

      @include('stages._form')

      <div class="form-group">
        <div class="col-md-10 col-md-offset-2 create__btns">
          {{ Form::reset('Очистить поля', ['class' => 'btn btn-default']) }}
          {{ Form::submit('Создать', ['class' => 'btn btn-primary']) }}
        </div>
      </div>
    </fieldset>
    {{ Form::close() }}
    </div>
  </section>
@endsection