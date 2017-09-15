@extends('layouts.app')

@section('content')

    @component('components.form')
        @slot('type') templates @endslot
        @slot('title') Создание нового шаблона @endslot

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {{ Form::label('name', 'Название шаблона', ['class' => 'col-md-3 control-label']) }}

            <div class="col-md-9">
                {{ Form::text('name', null, ['class'=>'form-control', 'required'=>true]) }}

                @if ($errors->has('name'))
                    <span class="help-block">{{  $errors->first('name') }}</span>
                @endif
            </div>
        </div>
    @endcomponent

@endsection
