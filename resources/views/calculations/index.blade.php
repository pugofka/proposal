@extends('layouts.app')

@section('content')
  <h2>Все расчёты</h2>
  <a href="{{ route('calculations.create') }}" class="calculations__new-calculation-link stages__btn btn btn-warning btn-fab">
    <i class="material-icons">
      <img src="{{ URL::asset('/img/plus.svg') }}" alt="">
    </i>
  </a>
@endsection
