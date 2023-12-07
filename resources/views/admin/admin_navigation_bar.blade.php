<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Add Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    {{-- CUSTOM STYLE SHEETS FOUND IN PUBLIC DIRECTORY --}}
    <link rel="stylesheet" href="{{ asset('navbars.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheet.css') }}">

    @yield('custom-style')
    <title>Student Violation Monitoring System</title>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    @vite('resources/js/app.js', 'build')
</head>

<body>
    <div id="app">
        <!-- TOP NAV BAR -->
        <div class="wrapper">
            <div class="top-nav">
                <a href="#" class="nav-link link-light">
                    <button class="btn toggle-button" id="sidebar-toggle"><i class="fas fa-bars"></i></button>
                    <span class="nav-link-text">Student Violation Monitoring System</span>
                </a>

                <div class="profile-dropdown dropdown">
                    <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle"
                        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://workforprosper.com/wp-content/plugins/supportboard/supportboard/media/user.png"
                            alt="" width="32" height="32" class="rounded-circle me-2">
                        <span class="profile-name"><strong>{{Auth::user()->fullname}}</strong></span>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        {{-- <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li> --}}
                        <li><a class="dropdown-item" href="{{url('/logout')}}">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- SIDE NAV BAR -->
        <div class="wrapper">
            <div class="p-3 sidebar" id="sidebar">
                <div class="d-md-flex flex-shrink-0">
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded dashboard-button">
                                <img src="/asset/cmu-logo.png" alt="Dashboard Image" width="20" height="20">
                                {{-- <a href=""> --}}
                                <span class="link-title"> CMU-SV-MS</span>
                                {{-- </a> --}}
                            </button>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded dashboard-button">
                                <i class="fas fa-tachometer-alt"></i>
                                <a href="/admin_dashboard">
                                    <span class="link-title">Dashboard</span>
                                </a>
                            </button>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded events-button">
                                <i class="fas fa-folder-open"></i>
                                <a href="/admin_violation_records">
                                <span class="link-title">Record Violation</span>
                                </a>
                            </button>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded events-button">
                                <i class="fas fa-list-alt"></i>
                                <a href="/admin_violation_sanction">
                                <span class="link-title">Violation Lists</span>
                                </a>
                            </button>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded events-button">
                                <i class="fas fa-book-reader"></i>
                                <a href="/admin_sanction_list">
                                <span class="link-title">Sanction List</span>
                                </a>
                            </button>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded events-button">
                                <i class="fas fa-check"></i>
                                <a href="/admin_validation">
                                <span class="link-title">Validation</span>
                                </a>
                            </button>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center studentlist-button">
                                <i class="fas fa-address-card"></i>
                                <a href="/admin_users_list">
                                <span class="link-title">Users</span>
                                </a>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            @yield('main-content')
        </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <!-- FullCalendar JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        document.onreadystatechange = () => {
            if (document.readyState === "complete") {

                // Toggle the sidebar when the burger button is clicked
                const toggleSidebarButton = document.getElementById('sidebar-toggle');
                const sidebar = document.getElementById('sidebar');

                toggleSidebarButton.addEventListener('click', function () {
                    sidebar.classList.toggle('collapsed');
                });
            }
              // Collapse the sidebar by default on smaller screens
            if (window.innerWidth <= 768) {
                sidebar.classList.add('collapsed');
            }
        }
    </script>
    @yield('custom-script')
</body>

</html>
