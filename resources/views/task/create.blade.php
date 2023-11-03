<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div>
    <form action="{{ route('task.store') }}" method="POST">
      @csrf
      <div>
        <label for="">Task</label>
        <input type="text" name="name" placeholder="Enter Task">
      </div>
      <div>
        <label for="">Date</label>
        <input type="date" name="due_date" >
      </div>
      <button type="submit">Create</button>
    </form>
  </div>
</body>
</html>