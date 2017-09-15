<section class="row">

    <div class="col-md-1">
        <a href="{{ route($type.'.index') }}" class="btn btn-primary btn-fab">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>

    <div class="col-md-11">
        <div class="well bs-component">
            {{ $slot }}
        </div>
    </div>

</section>
