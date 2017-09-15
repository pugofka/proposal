@extends('layouts.app')

@section('content')
    <section>
        <div class="row">
            <h1>Этапы</h1>

            @if(isset($stages) && !$stages->isEmpty())
                @component('components.table-list', ['list' => $stages, 'type' => 'stages'])@endcomponent
            @else
                @component('components.alert')
                    @slot('type') info @endslot
                    @slot('title') Нет данных @endslot
                    Не найдено ни одного этапа!
                @endcomponent
            @endif

            @component('components.add-btn') stages @endcomponent
        </div>
    </section>
@endsection
