@extends('layouts.app')

@section('content')
    <h2>Создание расчета</h2>
    <calculation-create
        :templates-data="{{ json_encode($templates) }}"
    />
@endsection
