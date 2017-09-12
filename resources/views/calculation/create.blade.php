@extends('layouts.app')

@section('content')
    @php
        $templates = [
            [
                "id" => 1,
                "name" => "Сайт-визитка"
            ],
            [
                "id" => 2,
                "name" => "Промо-сайт"
            ]
        ];
    @endphp
    <h2>Создание расчета</h2>
    <calculation
        :templates-data="{{ json_encode($templates) }}"
    />
@endsection
