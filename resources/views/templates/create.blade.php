@extends('layouts.app')

@section('content')

    @component('components.well')
        @slot('type') templates @endslot

        {{ Form::open(['url' => route('stages.store'), 'class' => 'form-horizontal']) }}
        <fieldset>
            <legend>Создание нового шаблона</legend>

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {{ Form::label('name', 'Название шаблона', ['class' => 'col-md-3 control-label']) }}

                <div class="col-md-9">
                    {{ Form::text('name', null, ['class'=>'form-control', 'required'=>true]) }}

                    @if ($errors->has('name'))
                        <span class="help-block">{{  $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="text-right">
                {{ Form::reset('Очистить поля', ['class' => 'btn btn-default']) }}
                {{ Form::submit('Создать', ['class' => 'btn btn-success btn-raised']) }}
            </div>
        </fieldset>
        {{ Form::close() }}
    @endcomponent

@endsection
