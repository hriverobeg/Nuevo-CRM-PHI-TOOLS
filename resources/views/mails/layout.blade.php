<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style type="text/css">
    p, h1, h2, h3, h4, h5, h6{
        margin: 0px
    }
  </style>
</head>
<body>
  <table style="width: 100%;margin: 0 auto;max-width: 650px;border-spacing: 0;font-family: Arial, Helvetica, sans-serif;color: #000;font-weight: normal">
    <tbody>
      <tr>
        <td>
          <div style="margin: 0px 100px 30px;">
            <img style="width: 200px;" src="{{ asset('assets/images/logo.jpg')}}" />
          </div>
          @yield('content')
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>
