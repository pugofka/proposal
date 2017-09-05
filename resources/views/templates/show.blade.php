@extends('layouts.app')
{{--{{ dd($stages) }}--}}
@section('content')
  <section class="templates">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <template-name
              :name-data="{{ json_encode($template->name) }}"
              :id-data="{{ json_encode($template->id) }}"
          />
          @foreach($stages as $stage)
            <b>{{ ($stage->name) }}</b>
        </div>
        <div class="col-md-12">Задачи</div>
        <div class="col-md-12">
          @foreach($stage->tasks as $task)
            <div style="display: flex; margin-left: 15px;">
              <input name="checkbox" type="checkbox" @if ($task->isActive($template->id)) checked="checked" @endif>
              <div style="margin-left: 5px">{{ $task->name }}</div>
            </div>
            @foreach($task->variants as $variant)
              <div style="display: flex; margin-left: 45px;">
                {{ $variant->name }}
                <input type="number" placeholder="Время (ч)" style="margin-left: 10px; width: 80px;">
              </div>
            @endforeach
          @endforeach
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection