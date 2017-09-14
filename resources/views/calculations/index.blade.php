@extends('layouts.app')

@section('content')
  <h2>Все расчёты</h2>
  <a href="{{ route('calculations.create') }}" class="calculations__new-calculation-link">Ноывый расчёт</a>
@endsection
