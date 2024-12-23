<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        @if (Auth::user() && Auth::user()->role == 'manager')
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#">Simple Task Manager</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('project') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('project') }}">Project</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('task') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('task') }}">Task</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('teammate') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('teammate') }}">Teammate</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('teammate') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('task_assign') }}">Task Assign</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn btn-dark text-white" href="{{ route('logout') }}">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        @elseif (Auth::user() && Auth::user()->role == 'teammate')
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">Simple Task Manager</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-white" href="{{ route('logout') }}">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @endif
        @yield('content')
    </div>

    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
