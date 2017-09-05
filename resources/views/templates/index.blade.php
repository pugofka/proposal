@extends('layouts.app')

@section('content')
  <section class="templates">
    <div class="row">
      <div class="templates__wrap">
        <h1 class="templates__title">Шаблоны</h1>
        <a href="{{ route('templates.create') }}" class="templates__btn btn btn-warning btn-fab">
          <i class="material-icons">
            <img src="{{ URL::asset('/img/plus.svg') }}" alt="">
          </i>
        </a>
      </div>
      <table class="table table-striped table-hover templates__table">
        <thead>
        <tr>
          <th>Название шаблона</th>
          <th>Редактирование</th>
        </tr>
        </thead>
        <tbody>

        @foreach($templates as $template)
          <tr>
            <td><a href="{{ route('templates.show', [$template->id]) }}">{{ $template->name }}</a></td>
            <td>
              <a href="{{ route('templates.edit', [$template->id]) }}" class="templates__modify-btn btn btn-warning btn-fab">
                <i class="material-icons">
                  <img src="{{URL::asset('/img/pen.svg')}}" alt="">
                </i>
              </a>
            </td>
          </tr>

        @endforeach
        </tbody>
      </table>
    </div>
  </section>

@endsection