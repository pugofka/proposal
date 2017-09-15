<section class="row">

    <div class="col-md-1">
        <a href="{{ route($type.'.index') }}" class="btn btn-primary btn-fab">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>

    <div class="col-md-11">
        <div class="well bs-component">
            {{ Form::open(['url' => route($type.'.store'), 'class' => 'form-horizontal']) }}
            <fieldset>
                <legend>{{ $title }}</legend>

                {{ $slot }}

                <div class="text-right">
                    {{ Form::reset('Очистить поля', ['class' => 'btn btn-default']) }}
                    {{ Form::submit('Создать', ['class' => 'btn btn-success btn-raised']) }}
                </div>
            </fieldset>
            {{ Form::close() }}
        </div>
    </div>

</section>
