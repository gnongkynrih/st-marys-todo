@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-4">
      <h5><a href="{{ route('task.index') }}">Back</a></h5>
    <form action="{{ route('task.update',$task->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div>
        <label for="">Task</label>
        <input value="{{ $task->name }}"
        type="text" name="name" placeholder="Enter Task">
        @error('name')
          <div>{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="">Date</label>
        <input type="date" name="due_date" 
        value="{{ date('Y-m-d',strtotime($task->due_date)) }}" >
        @error('due_date')
          <div>{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="">Completed</label>
        <select name="completed">
          <option {{ $task->completed ? "selected":""}} value="yes">Yes</option>
          <option {{ !$task->completed ? "selected":""}} value="no">No</option>
        </select>
      </div>
      <button type="submit">Update</button>
    </form>
    </div>
  </div>
@endsection