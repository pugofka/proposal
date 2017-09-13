@extends('layouts.app')
@section('content')
  <div class="input-group">
    <span class="input-group-addon personal-pages__field-name" id="basic-addon1">Имя</span>
    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <div class="input-group">
    <span class="input-group-addon personal-pages__field-name" id="basic-addon1">Логин (e-mail)</span>
    <input type="text" class="form-control" placeholder="Useremail" aria-label="Useremail" aria-describedby="basic-addon1">
  </div>
  <div class="input-group">
    <span class="input-group-addon personal-pages__field-name" id="basic-addon1">Пароль</span>
    <input type="text" class="form-control" placeholder="Userpassword" aria-label="Userpassword" aria-describedby="basic-addon1">
  </div>
@endsection