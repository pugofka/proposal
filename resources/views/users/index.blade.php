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
  <div class="row">
    <div class="create__wrapper">
      {{ Form::open(array('url' => route('users.update', $userData->id), 'method' => 'GET')) }}
      <div class="input-group">
        <span class="input-group-addon users__field-name" id="basic-addon1">Имя</span>
        {{ Form::text('user_name', $userData->name, ['class' => 'form-control users__input']) }}
      </div>
      <div class="input-group">
        <span class="input-group-addon users__field-name" id="basic-addon1">Логин (e-mail)</span>
        {{ Form::text('user_email', $userData->email, ['class' => 'form-control users__input']) }}
      </div>
      <div class="input-group">
        <span class="input-group-addon users__field-name" id="basic-addon1">Пароль</span>
        {{ Form::password('user_new_password', ['class' => 'form-control users__input']) }}
      </div>
      <div class="input-group">
        <span class="input-group-addon users__field-name" id="basic-addon1">Подтверждение пароля</span>
        {{ Form::password('user_new_password_confirm', ['class' => 'form-control users__input']) }}
      </div>
      {{ Form::submit('Обновить данные', ['class' => 'btn btn-primary']) }}
      {{ Form::close() }}
    </div>
  </div>
@endsection