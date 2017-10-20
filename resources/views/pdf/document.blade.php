<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    @page {
      /* ensure you append the header/footer name with 'html_' */
      header: html_customHeader; /* sets <htmlpageheader name="MyCustomHeader"> as the header */
      footer: html_MyCustomFooter; /* sets <htmlpagefooter name="MyCustomFooter"> as the footer */
    }

    body {
      background-color: #ffffff;
      color: #000000;
      font-size: 14px;
      line-height: 1.2;
    }

    .pdf-table-wrapper {
      display: flex;
      width: 100%;
      justify-content: center;
      align-items: center;
    }

    .pdf-first-page-table {
      border-collapse: collapse;
      border: 1px solid #000;
    }

    .pdf-first-page-table td {
      border: 1px solid #000;
    }

    .pdf-page {
      height: 100%;
      padding-top: 30px;
    }

    .pdf-h1 {
      font-size: 28px;
      width: 750px;
      text-align: center;
    }

    .pdf-owner,
    .pdf-estimate {
      width: 100%;
      text-align: center;
      border-collapse: collapse;
    }

    .pdf-estimate tr > td {
      background-color: cornflowerblue;
    }

  </style>
</head>
<body>

<htmlpageheader name="customHeader">
  <table
      style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"
      width="100%">
    <tbody>
    <tr>
      <td width="50%">Pugofka - веб-студия, которую рекомендуют.</td>
      <td style="text-align: right; font-weight: bold;" width="50%"><img src="{{ public_path('img/logo.png') }}"
                                                                         alt="logo"></td>
    </tr>
    </tbody>
  </table>
</htmlpageheader>

{{--Page-1--}}
<div class="pdf-page">
  <h1 class="pdf-h1">
    Коммерческое предложение по созданию сайта
  </h1>

  {{--<div class="pdf-table-wrapper">--}}
  {{--<table class="pdf-first-page-table">--}}
  {{--<tr>--}}
  {{--<td>Автор документа:</td>--}}
  {{--<td>Анна Булгар</td>--}}
  {{--</tr>--}}
  {{--<tr>--}}
  {{--<td class="cell-centered" colspan="2">Менеджер проектов</td>--}}
  {{--</tr>--}}
  {{--<tr>--}}
  {{--<td>Телефон:</td>--}}
  {{--<td>+7 (812) 425-64-08</td>--}}
  {{--</tr>--}}
  {{--<tr>--}}
  {{--<td>E-mail:--}}
  {{--</td>--}}
  {{--<td>a.bulgar@pugofka.com</td>--}}
  {{--</tr>--}}
  {{--</table>--}}
  {{--</div>--}}

  <div class="pdf-owner">
    Автор документа: Анна Булгар <br>
    менеджер проектов <br>
    Телефон: +7 (812) 425-64-08 <br>
    E-mail: a.bulgar@pugofka.com
  </div>
</div>

{{--Page-2--}}
<div class="pdf-page">
  <h2 class="pdf-h2">
    Этапы работ
  </h2>
  <br>
  {{--{{ dd($stages) }}--}}
  @foreach($stages as $stage)
    {{ $stage->stage_name }}
    <br>
  @endforeach
</div>

{{--Page-3--}}
<div class="pdf-page">
  <h2 class="pdf-h2">
    Расчётная смета проекта
  </h2>
  {{--{{ dd($defferedTasks) }}--}}
  {{--{{ dd($calculation) }}--}}
  @foreach($stages as $stage)
    {{--{{dd ($calculation)}}--}}
    {{ $stage->stage_name }}
    <table class="pdf-estimate" border="1">
      <tr>
        <td>Задачи</td>
        <td>Длительность, <br> часов</td>
        <td>Стоимость, <br> руб.</td>
      </tr>
      @foreach($stage->tasks as $task)
        @if ((int)$task->hours > 0)
          <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->hours }} час(ов)</td>
            <td>{{ $task->hours * $calculation->cost_per_hour }}</td>
          </tr>
        @endif
      @endforeach
    </table>
  @endforeach

  <h2 class="pdf-h2">
    Отложенные задачи
  </h2>
  @foreach($defferedTasks as $task)
      {{$task->name}}
  @endforeach
</div>

{{--Page-4--}}
<div class="pdf-page">
  <h2 class="pdf-h2">
    Почему мы?
  </h2>
  <img src="{{ public_path('img/achievements.png') }}" alt="achievements">
</div>

{{--Page-5--}}
<div class="pdf-page">
  <h2 class="pdf-h2">
    Примеры работ
  </h2>
</div>

{{--Page-6--}}
<div class="pdf-page">
  <h2 class="pdf-h2">
    Наши клиенты
  </h2>
</div>

{{--Page-7--}}
<div class="pdf-page">
  <h2 class="pdf-h2">
    Мы готовы ответить на ваши вопросы
  </h2>
</div>

{{--Page-8--}}
<div class="pdf-page">
  <h2 class="pdf-h2">
    Наш адрес
  </h2>
</div>

<htmlpagefooter name="MyCustomFooter">
  <table
      style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"
      width="100%">
    <tbody>
    <tr>
      <td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td>
      <td style="font-weight: bold; font-style: italic;" align="center" width="33%">{PAGENO}/{nbpg}</td>
      <td style="text-align: right;" width="33%">My document</td>
    </tr>
    </tbody>
  </table>
</htmlpagefooter>

</body>
</html>