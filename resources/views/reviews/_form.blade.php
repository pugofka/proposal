    @component('components.well')
        @slot('type') reviews @endslot
        @if (isset($review))
          {{ Form::model($review, ['route' => ['reviews.update', $review->id], 'method' => 'put', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) }}
        @else
          {{ Form::open(['url' => route('reviews.store'), 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) }}
        @endif
        <fieldset>
            
            @if ($formType == 'edit')
              <legend>Редактирование отзыва</legend>
            @else
              <legend>Добавление нового отзыва</legend>
            @endif
            <div class="form-group {{ $errors->has('name') ?  'has-error' : ''}}">
                {{ Form::label('name', 'Название отзыва', ['class' => 'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('name', null, ['class'=>'form-control']) }}
                    @if ($errors->has('name'))
                        <span class="help-block">{{  $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-group-image-loader{{ $errors->has('image') ?  'has-error' : ''}}">
                {{ Form::label('image', 'Картинка', ['class' => 'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::file('image', ['class'=>'form-control form-control--file', 'placeholder'=>'Выбрать файл']) }}
                    @if ($errors->has('image'))
                        <span class="help-block">{{  $errors->first('image') }}</span>
                    @endif
                </div>
            </div>
            @if ($formType == 'edit')
              <div class="form-group form-group-image-loader{{ $errors->has('image') ?  'has-error' : ''}}">
                  {{ Form::label('image', 'Картинка', ['class' => 'col-md-3 control-label']) }}
                  <div class="col-md-9">
                    <img src="{{asset('/storage/')}}/{{$review->image}}" alt="" style="height:auto; width:100%;">
                  </div>
              </div>
            @endif
            <div class="form-group {{ $errors->has('sort') ?  'has-error' : ''}}">
                {{ Form::label('sort', 'Порядок', ['class' => 'col-md-3 control-label']) }}
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
                            @if ($formType == 'create')
                                {{ Form::checkbox('active', '1', true) }} Активность
                            @else
                                {{ Form::checkbox('active') }} Активность
                            @endif
                        </label>
                    </div>
                </div>
            </div>

            

            @if ($formType == 'edit')
              <div class="text-right">
                {{ Form::submit('Сохранить', ['class' => 'btn btn-success btn-raised']) }}
              </div>
            @else
              <div class="text-right">
                {{ Form::submit('Добавить', ['class' => 'btn btn-success btn-raised']) }}
              </div>
            @endif
        </fieldset>
        {{ Form::close() }}
@endcomponent
