@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="stages">
        @foreach($stages  as $stage)
          <div class="stage">
            <div class="stage__name" style="display: inline-block;">{{ $stage->name }}</div>
            <a href="{{ route('stages.edit', ['id' => $stage->id]) }}" class="stage__edit">Редактировать</a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection