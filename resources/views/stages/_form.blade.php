<div class="form-group">
  {{ Form::label('name', 'Название этапа', ['class' => 'col-md-3 control-label']) }}

  <div class="col-md-9">
    {{ Form::text('name', (isset($stage->name)) ? $stage->name : '', ['class' => 'form-control']) }}
    <span class="help-block">Please enter a valid email address</span>
  </div>
</div>
<div class="form-group">
  {{ Form::label('number', 'Номер этапа', ['class' => 'col-md-3 control-label']) }}

  <div class="col-md-9">
    {{ Form::number('number', (isset($stage->sort)) ? $stage->sort : '', ['class' => 'form-control']) }}
    <span class="help-block">Please enter a valid email address</span>
  </div>
</div>


<div class="togglebutton form-group">
  {{ Form::label('active', 'Активность этапа', ['class' => 'col-md-3 control-label']) }}
  <label>
    {{ Form::checkbox('active') }}
  </label>
</div>