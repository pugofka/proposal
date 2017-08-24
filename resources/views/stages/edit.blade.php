@extends('layouts.app')

@section('content')
  <section class="create">
    {{--<form class="form-horizontal">--}}
    {{ Form::model($stage, ['route' => ['stages.update', $stage->id], 'method' => 'put', 'class' => 'create__form form-horizontal'])  }}
    <fieldset>
      <legend>Редактирование этапа "{{ $stage->name }}"</legend>

      @include('stages._form')

      <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
          {{ Form::reset('Удалить', ['class' => 'btn btn-default']) }}
          {{ Form::submit('Сохранить изменения', ['class' => 'btn btn-primary']) }}
        </div>
      </div>
    </fieldset>
    {{ Form::close() }}
  </section>
@endsection