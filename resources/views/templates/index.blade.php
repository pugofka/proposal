@extends('layouts.app')

@section('content')
  <section class="templates">
    <div class="row">
      <div class="templstes__wrap">
        <h1 class="templates__title">Шаблоны</h1>
        <a href="{{ route('stages.create') }}" class="templstes__btn btn btn-warning btn-fab">
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
            <td>{{ $template->name }}</td>
            <td>
              <a href="javascript:void(0);" class="templates__modify-btn btn btn-warning btn-fab">
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