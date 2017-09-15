@extends('layouts.app')

@section('content')
  <h2>Все расчёты</h2>

  <ul class="calculations__items">

    @foreach($calculations as $calculation)
      <li class="calculations__item">
        <a href="{{ route('calculations.edit', ['id' => $calculation->id ])  }}" class="calculations__item-name">{{ $calculation->name }}</a>
        {{ Form::open(['url' => route('calculations.destroy', ['id' => $calculation->id]), 'method'=> 'delete' ]) }}

        {{ Form::submit('X') }}

        {{Form::close()}}
      </li>
    @endforeach

  </ul>

  <a href="{{ route('calculations.create') }}"
     class="calculations__new-calculation-link stages__btn btn btn-warning btn-fab">
    <i class="material-icons">
      <img src="{{ URL::asset('/img/plus.svg') }}" alt="">
    </i>
  </a>
@endsection
