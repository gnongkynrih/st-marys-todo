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
    <h5><a href="{{ route('task.index') }}">Back</a></h5>
    <form action="{{ route('task.store') }}" method="POST">
      @csrf
      <div>
        <label for="">Task</label>
        <input 
        type="text" name="name" placeholder="Enter Task">
        @error('name')
          <div>{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="">Date</label>
        <input type="date" name="due_date" >
        @error('due_date')
          <div>{{ $message }}</div>
        @enderror
      </div>
      <button type="submit">Create</button>
    </form>
  </div>
</body>
</html>