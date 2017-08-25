<div class="form-group {{ $errors->has('sort') ?  'has-error' : ''}}">
  {{ Form::label('name', 'Название этапа', ['class' => 'col-md-3 control-label']) }}

  <div class="col-md-9">
    {{ Form::text('name', null, ['class'=>'form-control']) }}

    @if ($errors->has('name'))
      {!!  $errors->first('name', '<span class="help-block">:message</span>') !!}
    @endif

  </div>
</div>
<div class="form-group {{ $errors->has('sort') ?  'has-error' : ''}}">
  {{ Form::label('sort', 'Номер этапа', ['class' => 'col-md-3 control-label']) }}

  <div class="col-md-9">
    {{ Form::number('sort', null, ['class'=>'form-control']) }}
    @if ($errors->has('sort'))
      {!!  $errors->first('sort', '<span class="help-block">:message</span>') !!}
    @endif
  </div>
</div>


<div class="togglebutton form-group">
  {{ Form::label('active', 'Активность этапа', ['class' => 'col-md-3 control-label']) }}
  <label>
    {{ Form::checkbox('active') }}
  </label>
</div>