@extends('layouts.app')

@section('content')

    @component('components.well')
        @slot('type') stages @endslot

        {{ Form::model($stage, ['route' => ['stages.update', $stage->id], 'method' => 'put', 'class' => 'form-horizontal'])  }}
        <fieldset>
            <legend>Редактирование этапа</legend>

            <div class="form-group {{ $errors->has('name') ?  'has-error' : ''}}">
                {{ Form::label('name', 'Название этапа', ['class' => 'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('name', null, ['class'=>'form-control']) }}
                    @if ($errors->has('name'))
                        <span class="help-block">{{  $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('sort') ?  'has-error' : ''}}">
                {{ Form::label('sort', 'Номер этапа', ['class' => 'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::number('sort', null, ['class'=>'form-control']) }}
                    @if ($errors->has('sort'))
                        <span class="help-block">{{  $errors->first('sort') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    <div class="togglebutton">
                        <label>
                            {{ Form::checkbox('active') }} Активность
                        </label>
                    </div>
                </div>
            </div>

            <div class="text-right">
                {{ Form::submit('Сохранить', ['class' => 'btn btn-success btn-raised']) }}
            </div>
        </fieldset>
        {{ Form::close() }}
    @endcomponent

@endsection
