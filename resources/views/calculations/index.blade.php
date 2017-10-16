@extends('layouts.app')

@section('content')
    <section>
        <div class="row">
            <h1>Расчёты</h1>

            @if(isset($calculations) && !$calculations->isEmpty())
                @component('components.table-list', ['list' => $calculations, 'type' => 'calculations'])@endcomponent
            @else
                @component('components.alert')
                    @slot('type') info @endslot
                    @slot('title') Нет данных @endslot
                    Не найдено ни одного расчета!
                @endcomponent
            @endif

            @component('components.add-btn') calculations @endcomponent
        </div>
    </section>
@endsection
