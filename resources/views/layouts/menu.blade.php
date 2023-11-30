<nav class="navbar navbar-expand-lg bg-menu">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('dashboard.index')}}">
       <i class="fa-solid fa-dashboard"></i>&nbsp;Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Task
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('task.create')}}">New Task</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('task.index')}}">List Task</a></li>
          </ul>
        </li>
      
      </ul>
      <form class="d-flex" role="search" method="GET" action="{{route('task.index')}}">
        <div class="input-group">
          <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search">
          <button class="btn card" type="submit">
           <i class="fa-solid fa-search"></i></button>
        </div>
      </form>
    </div>
  </div>
</nav>