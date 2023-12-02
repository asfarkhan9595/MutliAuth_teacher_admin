<!-- resources/views/students/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Admin Dashboard</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('students.index') }}">All Student</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('students.create') }}">Add Student</a>
              </li>
            </ul>

            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register.form') }}"> @auth
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit">Logout</button>
                  </form>
              @else
                  {{-- Add login link or button --}}
              @endauth</a>
            </li>
            </ul>
          </div>
        </div>
      </nav>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
<div class="container mt-4">
   

    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="class">Class:</label>
        <input type="text" id="class" name="class" required>

        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
