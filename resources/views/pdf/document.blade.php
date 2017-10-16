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

    .pdf-owner {
      width: 100%;
      text-align: center;
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
    Телефон: +7 (812) 425-64-08
  </div>
</div>

{{--Page-2--}}
<div class="pdf-page">
  <h2 class="pdf-h2">
    Этапы работ
  </h2>

  <br>

@foreach($stages as $stage)
    {{$stage->name}}
    <br>
  @endforeach

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