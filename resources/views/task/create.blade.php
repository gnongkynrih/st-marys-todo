@extends('layouts.app')
@section('content')
<form action="{{ route('task.store') }}" method="POST">
  <div class="row justify-content-center">
    <div class="card col-6">
      <div class="card-body">
        
          @csrf
          <div class="mb-3">
            <label class="form-label" for="">Task</label>
            <input class="form-control" 
            type="text" name="name" placeholder="Enter Task">
            @error('name')
              <div>{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="">Date</label>
            <input type="date" name="due_date" class="form-control"  >
            @error('due_date')
              <div>{{ $message }}</div>
            @enderror
          </div>
          
       
      </div>
      <div class="card-footer text-center">
        <a class="btn btn-warning" href="{{ route('task.index') }}">Back</a>
        
            <button class="btn btn-primary" type="submit">Create</button>
      </div>
    </div>
  </div>
</form>
@endsection