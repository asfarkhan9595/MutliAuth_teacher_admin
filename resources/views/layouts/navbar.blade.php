<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">{{ Auth::user()->name }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('students.index') }}">Student List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('students.create') }}">Add Student</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            @if(auth()->check())
                @if(auth()->user()->role === 'admin')
                    Admin
                @else
                    Teacher
                @endif
            @endif
        </li>
        
        
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