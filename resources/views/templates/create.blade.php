@extends('layouts.app')

@section('content')
  <section class="create">
    <a href="{{ route('templates.index') }}" class="create__btn btn btn-warning btn-fab">
      <i class="material-icons">
        <img src="{{URL::asset('/img/back.svg')}}" alt="">
      </i>
    </a>
    <div class="create__wrapper">
      {{ Form::open(['url' => route('templates.store'), 'class' => 'create__form form-horizontal']) }}
      <fieldset>
        <legend>Создание нового шаблона</legend>

        @include('templates._form')

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