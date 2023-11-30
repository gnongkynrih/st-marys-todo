@extends('layouts.app')
@section('content')
  <div class="row justify-content-center text-light">
    <div class="col-6 card">
      <div class="card-body">
        <h5>Task List</h5>
  <a class="btn btn-warning" href="{{ route('task.create') }}">
    <i class="fa-solid fa-floppy-disk"></i> New Task</a>
  <hr/>
  <table class="table  table-striped table-hover table-bordered table-responsive">
    <thead>
      <tr><th>Task</th><th>Date</th><th>Completed</th>
      <th>Edit</th><th>Delete</th></tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
        <tr id="R{{$task->id}}">
          <td>
            <div class="form-check">
              @if($task->completed == true)
                <input type="checkbox" class="chkComplete form-check-input" checked id="C{{ $task->id}}">
              @else
                <input type="checkbox" class="chkComplete  form-check-input"  id="C{{ $task->id}}">
              @endif
            </div>
          </td>
          <td>{{ $task->name }}</td>
          <td>{{  date('d/m/Y', strtotime($task->due_date)) }}</td>
          
          <td><a href="{{ route('task.edit', $task->id) }}">
          <i class="fa-solid fa-pen-to-square pink"></i>
          </a></td>
          <td>
            <a href="#" class="del" id="D{{$task->id}}">
            <i class="fa-solid fa-trash text-danger"></i>
          </a></td>
           
        </tr>
      @endforeach
    </tbody>
  </table>
  {!! $tasks->withQueryString()->links('pagination::bootstrap-5') !!}
    
      </div>
    </div>
  </div>

  <script>
    //get all the checkbox
    const checkboxes = document.querySelectorAll('.chkComplete');
    checkboxes.forEach(ch => {
      //give each checkbox an event listener... click event
      ch.addEventListener('click', async function() {
        try{
          const id = this.id.replace('C', '');  //get the id of the selected checkbox
          const response = await axios.put(`/task/${id}`, {});
          console.log(response.data.status);
        }catch(err){
          console.log(err);
        }
      });
    });

    //get all the delete links
    const deleteLinks = document.querySelectorAll('.del');
    deleteLinks.forEach(link => {
      //give each link an event listener... click event
      link.addEventListener('click', async function(e) {
        e.preventDefault(); //disable its default behaviour

        const confirmDelete = confirm('Are you sure you want to delete this task?');
        if(!confirmDelete) return; //if user clicks cancel, do nothing

        const id = this.id.replace('D', '');  //get the id of the selected checkbox
        const response = await axios.delete(`/task/${id}`);
        document.getElementById(`R${id}`).remove(); //remove the row from the table
        
        // window.location.reload(); //reload the page
      });
    });
  </script>
@endsection