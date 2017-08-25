<div class="form-group">
  {{ Form::label('name', 'Название этапа', ['class' => 'col-md-3 control-label']) }}

  <div class="col-md-9">
    {{ Form::text('name', (isset($stage->name)) ? $stage->name : '', ['class' => 'form-control']) }}
    <div class="alert alert-dismissible alert-warning">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <p>Некорректные данные</p>
    </div>
  </div>
</div>
<div class="form-group">
  {{ Form::label('number', 'Номер этапа', ['class' => 'col-md-3 control-label']) }}

  <div class="col-md-9">
    {{ Form::number('number', (isset($stage->sort)) ? $stage->sort : '', ['class' => 'form-control']) }}
    <div class="alert alert-dismissible alert-warning">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <p>Некорректные данные</p>
    </div>
  </div>
</div>

<div class="togglebutton form-group">
  {{ Form::label('active', 'Активность этапа', ['class' => 'col-md-3 control-label']) }}
  <label>
    {{ Form::checkbox('active') }}
  </label>
</div>