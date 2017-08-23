@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="stages col-md-12">
        <h1>Редактируем этап {{ $stage->name }}</h1>
{{--{{ dd($stage) }}--}}
        {{ Form::model($stage, ['route' => ['stages.update', $stage->id], 'method' => 'put'])  }}
{{--        {!! Form::open(['route' => ['stages.update', $stage->id], 'method' => 'put']) !!}--}}


        <div class="row">
          <div class="col-md-3">
            {{  Form::label('name', 'Название этапа') }}
          </div>
          <div class="col-md-9">
            {{ Form::text('name') }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            {{  Form::label('name', 'Сортировка') }}
          </div>
          <div class="col-md-9">
            {{ Form::text('sort') }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            {{  Form::label('name', 'Этап ктивен?') }}
          </div>
          <div class="col-md-9">
            {{ Form::text('active') }}
          </div>
        </div>

        {{ Form::submit('Click Me!') }}

        {{Form::close()}}

      </div>
    </div>
  </div>
@endsection