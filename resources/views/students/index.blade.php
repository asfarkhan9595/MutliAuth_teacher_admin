<!-- resources/views/students/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
  @include('layouts.navbar');

    @if(session('success'))
    <div class="container mt-4">
        <p style="color: green;">{{ session('success') }}</p>
    </div>
    @endif
    <div class="container mt-4">
      <div class="table-responsive">
          <table class="table table-bordered">
              <thead class="thead-dark">
                  <tr>
                      <th>Name</th>
                      <th>Email</th>
                      @if(auth()->user() && auth()->user()->role === 'admin')
                          <th>Teacher</th>
                      @endif
                      <th>Class</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($students as $student)
                      <tr>
                          <td>{{ $student->name }}</td>
                          <td>{{ $student->email }}</td>
                          @if(auth()->user() && auth()->user()->role === 'admin')
                              <td>
                                  @if($student->teacher)
                                      {{ $student->teacher->name }}
                                  @else
                                      N/A
                                  @endif
                              </td>
                          @endif
                          <td>{{ $student->class }}</td>
                          <td>
                            <form action="{{ route('students.destroy', ['id' => $student->id]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                          
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  
    
</body>
</html>
