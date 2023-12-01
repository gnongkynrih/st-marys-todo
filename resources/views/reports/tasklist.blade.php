<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tast Report</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
 <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    h3 {
      text-align: center;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    tr:hover {background-color:#f5f5f5;}
    </style>
</head>
<body>
  <img src="{{ public_path('images/laravel.jpeg') }}" alt="logo" width="100" height="100">
  <h3>Task Report</h3>  
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Task </th>
        <th> Due Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
        <tr>
          <td>{{ $task->name }}</td>
          <td>{{ date('d-m-Y',strtotime($task->due_date)) }}</td>
        </tr>
      @endforeach
    </tbody>
</body>
</html>