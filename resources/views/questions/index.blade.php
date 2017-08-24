@extends('layouts.app')

@section('content')
<section class="questions">
<form class="form-horizontal">
<legend>Проектирование</legend>
  <fieldset>
  <div class="questions__form">
    <div class="form-group questions__wrap">
      <label for="" class="control-label">Задача</label>

      <div class="">
        <input type="text" class="form-control" id="">
      </div>
      <a href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab"><i class="material-icons">
      	<img src="{{URL::asset('/img/plus.svg')}}" alt="">
      </i></a>
    </div>
    <div class="form-group  questions__wrap">
      <label for="" class="control-label">Варианты</label>

      <div class="questions__del">
        <input type="text" class="form-control" id="">
        <a href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab"><i class="material-icons">
        <img src="{{URL::asset('/img/minus.svg')}}" alt="">
         </i></a>
      </div>

      <div class="questions__del">
        <input type="text" class="form-control" id="">
        <a href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab"><i class="material-icons">
        <img src="{{URL::asset('/img/minus.svg')}}" alt="">
        </i></a>
      </div>
      <a href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab"><i class="material-icons">
      <img src="{{URL::asset('/img/plus.svg')}}" alt="">
      </i></a> 
    </div>
    <div class="form-group  questions__wrap">
      <label for="" class="control-label">Шаблоны</label>
      <div class="">
        <select id="" multiple="" class="form-control">
          <option>Лендинг</option>
          <option>Интернет-магазин</option>
          <option>Сервис</option>
          <option>Корпоративный сайт</option>
        </select>
      </div>
    </div>
    <a href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab"><i class="material-icons">
    	<img src="{{URL::asset('/img/minus.svg')}}" alt="">
    	 </i></a>
    </div>
      </fieldset>
</form>

<form class="form-horizontal">
<legend>ТЗ</legend>
  <fieldset>
  <div class="questions__form">
    <div class="form-group questions__wrap">
      <label for="" class="control-label">Задача</label>

      <div class="">
        <input type="text" class="form-control" id="">
      </div>
      <a href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab"><i class="material-icons">
      <img src="{{URL::asset('/img/plus.svg')}}" alt="">
      </i></a>
    </div>
    <div class="form-group  questions__wrap">
      <label for="" class="control-label">Варианты</label>

      <div class="">
        <input type="text" class="form-control" id="">
      </div>
      <a href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab"><i class="material-icons">
      	<img src="{{URL::asset('/img/plus.svg')}}" alt="">
      	</i></a>
    
    </div>
    <div class="form-group  questions__wrap">
      <label for="" class="control-label">Шаблоны</label>
      <div class="">
        <select id="" multiple="" class="form-control">
          <option>Лендинг</option>
          <option>Интернет-магазин</option>
          <option>Сервис</option>
          <option>Корпоративный сайт</option>
        </select>
      </div>
    </div>
    <a href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab"><i class="material-icons">
    	<img src="{{URL::asset('/img/minus.svg')}}" alt="">
    	</i></a>
    </div>
      </fieldset>
</form>

<form class="form-horizontal">
<legend>Верстка</legend>
  <fieldset>
  <div class="questions__form">
    <div class="form-group questions__wrap">
      <label for="" class="control-label">Задача</label>

      <div class="">
      </div>
      <a href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab"><i class="material-icons">
      	<img src="{{URL::asset('/img/plus.svg')}}" alt="">
      </i></a>
    </div>
    <div class="form-group  questions__wrap">
      <label for="" class="control-label">Варианты</label>

      <div class="">
      </div>
    </div>
    <div class="form-group  questions__wrap">
      <label for="" class="control-label">Шаблоны</label>
      <div class="">
      </div>
    </div></div>
      </fieldset>
</form>
</section>
@endsection