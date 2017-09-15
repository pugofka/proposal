@extends('layouts.app')

@section('content')

    <h2>Редактирование расчета</h2>

    <calculation-edit
        :templates-data="{{ json_encode($templates) }}"
        :calculate-data="{{ json_encode($calculateData[0]) }}"
    />

@endsection
