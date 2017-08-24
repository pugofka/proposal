@extends('layouts.app')

@section('content')
<section class="create">
<form class="create__form form-horizontal">
  <fieldset>
    <legend>Создание этапа</legend>
    <div class="form-group">
      <label for="name" class="col-md-3 control-label">Название этапа</label>

      <div class="col-md-9">
        <input type="text" class="form-control" id="name">
      </div>
    </div>
    <div class="form-group">
      <label for="number" class="col-md-3 control-label">Сортировка</label>

      <div class="col-md-9">
        <input type="number" class="form-control" id="number">

        <div class="togglebutton">
          <label>
            <input type="checkbox" checked> Активность этапа
          </label>
        </div>
        
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button type="button" class="btn btn-default">Удалить</button>
        <button type="submit" class="btn btn-primary">Создать</button>
      </div>
    </div>
  </fieldset>
</form>
</section>

@endsection