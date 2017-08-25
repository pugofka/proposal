<div class="form-group">
  {{ Form::label('name', 'Название этапа', ['class' => 'col-md-3 control-label']) }}

  <div class="col-md-9">
    {{ Form::text('name', null, $errors->has('name') ? ['class'=>'form-control error'] : ['class'=>'form-control']) }}

    @if ($errors->has('name'))
      {!!  $errors->first('name', '<small class=error>:message</small>') !!}
    @endif
  </div>
</div>
<div class="form-group">
  {{ Form::label('sort', 'Номер этапа', ['class' => 'col-md-3 control-label']) }}

  <div class="col-md-9">
    {{ Form::number('sort', null, $errors->has('sort') ? ['class'=>'form-control error'] : ['class'=>'form-control']) }}
    @if ($errors->has('sort'))
      {!!  $errors->first('sort', '<small class=error>:message</small>') !!}
    @endif

  </div>
</div>

<div class="togglebutton form-group">
  {{ Form::label('active', 'Активность этапа', ['class' => 'col-md-3 control-label']) }}
  <label>
    {{ Form::checkbox('active') }}
  </label>
</div>