<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Student Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- Left Side of the Nav Bar -->
      <li class="nav-item">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if(isset($_SESSION['login'])): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/course" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/course/add">Add Course</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/course/past-course">Past/Running Courses</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/student" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Student
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/student/add">Add Student</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/student">View Students</a>
        </div>
      </li>
      <?php endif; ?>
    </ul>

    <!-- Right Side of the Nav Bar -->
    <?php if(isset($_SESSION['login'])): ?>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form action="/logout" method="post">
            <input class="btn btn-secondary" type="submit" value="Logout">
          </form>
        </li>
      </ul>
    <?php else: ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</nav>
