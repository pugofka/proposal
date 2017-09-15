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
    </style>
  </head>
  <body>

  <htmlpageheader name="customHeader">
    <table style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;" width="100%">
      <tbody>
      <tr>
        <td width="50%">PUGOFKA</td>
        <td style="text-align: right; font-weight: bold;" width="50%"><img src="{{ public_path('img/logo.png') }}" alt="logo"></td>
      </tr>
      </tbody>
    </table>
  </htmlpageheader>



  <htmlpagefooter name="MyCustomFooter">
    <table style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;" width="100%">
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