@extends('layouts.app')



@section('content')
    <section>
        <div class="row">
            <h1>Отзывы клиентов</h1>

            @if(isset($reviews) && !$reviews->isEmpty())
                @component('components.table-list', ['list' => $reviews, 'type' => 'reviews'])@endcomponent
            @else
                @component('components.alert')
                    @slot('type') info @endslot
                    @slot('title') Нет данных @endslot
                    Не найдено ни одного отзыва!
                @endcomponent
            @endif

            @component('components.add-btn') reviews @endcomponent
        </div>
    </section>
@endsection