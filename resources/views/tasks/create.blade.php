@extends('layouts.app')
@section('content')
  {{ Form::model($stage, ['route' => ['stages.update', $stage->id], 'method' => 'put', 'class' => 'create__form form-horizontal'])  }}

  {{ Form::text('name', null, ['class'=>'form-control']) }}

  {{ Form::close() }}
@endsection