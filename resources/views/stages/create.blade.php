@extends('layouts.app')

@section('content')
  <section class="create">
    {{--<form class="form-horizontal">--}}
    {{ Form::open(array('url' => route('stages.store'))) }}
    <fieldset>
      <legend>Создание нового этапа</legend>

      @include('stages._form')

      <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
          {{ Form::reset('Очистить поля', ['class' => 'btn btn-default']) }}
          {{ Form::submit('Создать', ['class' => 'btn btn-primary']) }}
        </div>
      </div>
    </fieldset>
    {{ Form::close() }}
  </section>
@endsection