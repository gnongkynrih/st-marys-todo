<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h5>Task List</h5>
  <a href="{{ route('task.create') }}">Create Task</a>
  <hr/>
  <table>
    <thead>
      <tr><th>Task</th><th>Date</th><th>Completed</th>
      <th>Edit</th><th>Delete</th></tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
        <tr>
          <td>{{ $task->name }}</td>
          <td>{{  date('d/m/Y', strtotime($task->due_date)) }}</td>
          <td>{{ $task->completed == true ?'Yes':'No' }}</td>
          <td><a href="{{ route('task.edit', $task->id) }}">Edit</a></td>
          <td>
            {{-- <form action="{{ route('task.destroy', $task->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit">Delete</button>
            </form> --}}
        </tr>
      @endforeach
    </tbody>
  </table>
  
</body>
</html>