<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Todo</title>
  <style>
    body{
      background-color: #1F1F1F;
    }
    .btn-primary{
      background-color:#E492AE;
      color: #1F1F1F;
      border-color: #E492AE
    }
    .btn-primary:hover{
      background: #ed6b97;
      border-color: #ed6b97;
    }
    .btn-warning{
      background: #5B5958;
      color: #FFF;
      border-color: #5B5958
    }
    .card{
      background-color: #4C4C4C;
      color: #FFF;
    }
  </style>
</head>
<body>
    @include('layouts.menu')
    @yield('content')
</body>
</html>