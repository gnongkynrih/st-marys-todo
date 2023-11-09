<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
        <tr id="R{{$task->id}}">
          <td>{{ $task->name }}</td>
          <td>{{  date('d/m/Y', strtotime($task->due_date)) }}</td>
          <td>
            @if($task->completed == true)
              <input type="checkbox" class="chkComplete" checked id="C{{ $task->id}}">
            @else
              <input type="checkbox" class="chkComplete"  id="C{{ $task->id}}">
            @endif
          </td>
          <td><a href="{{ route('task.edit', $task->id) }}">Edit</a></td>
          <td>
            <a href="#" class="del" id="D{{$task->id}}">Delete</a></td>
           
        </tr>
      @endforeach
    </tbody>
  </table>
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
</body>
</html>