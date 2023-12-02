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

      <div class="container mt-4">
        @if(auth()->check())
            <div class="card">
                <div class="card-header">
                    User Profile
                </div>
                <div class="card-body">
                    <h5 class="card-title">Name: {{ auth()->user()->name }}</h5>
                    <p class="card-text">Email: {{ auth()->user()->email }}</p>
                    <p class="card-text">Role: {{ auth()->user()->role }}</p>
                    <!-- Add more profile information as needed -->
                </div>
            </div>
        @else
            <p>User not logged in</p>
        @endif
    </div>
    
</body>
</html>