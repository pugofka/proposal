@extends('layouts.app')

@section('content')
    <section>
        <div class="row">
            <h1>Шаблоны</h1>

            @if(isset($templates) && !$templates->isEmpty())
                @component('components.table-list', ['list' => $templates, 'type' => 'templates'])@endcomponent
            @else
                @component('components.alert')
                    @slot('type') info @endslot
                    @slot('title') Нет данных @endslot
                    Не найдено ни одного шаблона!
                @endcomponent
            @endif

            @component('components.add-btn') templates @endcomponent
        </div>
    </section>
@endsection
