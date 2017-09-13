@extends('layouts.app')
@section('content')
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  <div class="row">
    <h2 class="users__title">Данные аккаунта</h2>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif


  <div class="row">
    <div class="create__wrapper">
      {{ Form::open(array('url' => route('users.update', $userData->id), 'method' => 'GET')) }}
      <div class="input-group">
        <span class="input-group-addon users__field-name" id="basic-addon1">Имя</span>
        {{ Form::text('name', $userData->name, ['class' => 'form-control users__input']) }}
      </div>
      <div class="input-group">
        <span class="input-group-addon users__field-name" id="basic-addon1">Логин (e-mail)</span>
        {{ Form::text('email', $userData->email, ['class' => 'form-control users__input']) }}
      </div>
      <div class="input-group">
        <span class="input-group-addon users__field-name" id="basic-addon1">Пароль</span>
        {{ Form::password('password', ['class' => 'form-control users__input']) }}
      </div>
      <div class="input-group">
        <span class="input-group-addon users__field-name" id="basic-addon1">Подтверждение пароля</span>
        {{ Form::password('password_confirmation', ['class' => 'form-control users__input']) }}
      </div>
      {{ Form::submit('Обновить данные', ['class' => 'btn btn-primary']) }}
      {{ Form::close() }}
    </div>
  </div>
@endsection