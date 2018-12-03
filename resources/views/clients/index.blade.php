@extends('layouts.app')

@section('content')
    <section>
        <div class="row">
            <h1>Клиенты</h1>

            @if(isset($clients) && !$clients->isEmpty())
                @component('components.table-list', ['list' => $clients, 'type' => 'clients'])@endcomponent
            @else
                @component('components.alert')
                    @slot('type') info @endslot
                    @slot('title') Нет данных @endslot
                    Не найдено ни одного клиента!
                @endcomponent
            @endif

            @component('components.add-btn') clients @endcomponent
        </div>
    </section>
@endsection