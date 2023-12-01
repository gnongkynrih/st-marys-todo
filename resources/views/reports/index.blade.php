@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="card col-5">
    <div class="card-body">
      <form action="{{ route('task.export')}}">
        <div class="mb-3">
          <label for="from" class="form-label">From</label>
          <input type="date" class="form-control" id="from" name="from" required>
        </div>
        <div class="mb-3">
          <label for="to" class="form-label">To</label>
          <input type="date" class="form-control" id="to" name="to" required>
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" id="status" name="status" required>
            <option value="0">Not Completed</option>
            <option value="1">Completed</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Export</button>
      </form>
    </div>
  </div>
</div>
@endsection