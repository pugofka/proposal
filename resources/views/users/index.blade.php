@extends('layouts.app')
@section('content')
  <h2 class="users__title">Данные аккаунта</h2>
  <div class="input-group">
    <span class="input-group-addon users__field-name" id="basic-addon1">Имя</span>
    <input type="text" class="form-control users__input" placeholder="Имя" aria-label="Username" aria-describedby="basic-addon1" value="{{ $userData->name }}">
  </div>
  <div class="input-group">
    <span class="input-group-addon users__field-name" id="basic-addon1">Логин (e-mail)</span>
    <input type="text" class="form-control users__input" placeholder="e-mail" aria-label="Useremail" aria-describedby="basic-addon1" value="{{ $userData->email }}">
  </div>
  <div class="input-group">
    <span class="input-group-addon users__field-name" id="basic-addon1">Пароль</span>
    <input type="password" class="form-control users__input" placeholder="Пароль" aria-label="Userpassword" aria-describedby="basic-addon1" value="{{ $userData->password }}">
  </div>
@endsection