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

    {{ Form::model($template, ['route' => ['templates.update', $template->id], 'method' => 'put', 'class' => 'create__form form-horizontal'])  }}
    <fieldset>
      <legend>Редактирование шаблона "{{ $template->name }}"</legend>

      @include('templates._form')

      <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
          {{ Form::submit('Сохранить изменения', ['class' => 'btn btn-primary']) }}
        </div>
      </div>
    </fieldset>
    {{ Form::close() }}
    
    {{ Form::open(['url' => route('templates.destroy', ['íd' => $template->id]), 'method'=> 'delete', 'class' => 'form__delete' ]) }}
      {{ Form::submit('Удалить', ['class' => 'btn btn-default']) }}
    {{Form::close()}}
    </div>
  </section>
@endsection