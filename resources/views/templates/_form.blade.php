<div class="form-group {{ $errors->has('sort') ?  'has-error' : ''}}">
  {{ Form::label('name', 'Название шаблона', ['class' => 'col-md-3 control-label']) }}

  <div class="col-md-9">
    {{ Form::text('name', null, ['class'=>'form-control']) }}

    @if ($errors->has('name'))
      {!!  $errors->first('name', '<span class="help-block">:message</span>') !!}
    @endif
  </div>
</div>