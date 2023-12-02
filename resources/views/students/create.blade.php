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
   @include('layouts.navbar');
   @if(session('success'))
   <div class="container mt-4">
    <p style="color: green;">{{ session('success') }}</p>
</div>
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
