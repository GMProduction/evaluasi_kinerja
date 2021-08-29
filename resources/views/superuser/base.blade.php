<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Super User | Evaluasi Kinerja </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/boxicon.min.css') }}" type="text/css"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- custom css -->

    <script src="{{ asset('js/swal.js') }}"></script>
    @yield('moreCss')
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

        <div class="d-flex align-items-center">
            <p class="me-2 mb-0">Hi, SuperAdmin </p>
            <div class="header_img"> <img
                    src="https://awsimages.detik.net.id/community/media/visual/2021/05/05/takeuchi-miyu_43.jpeg?w=700&q=90"
                    style="object-fit: cover" alt=""> </div>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo">
                    {{-- <i class='bx bx-layer nav_logo-icon'></i> --}}
                    <span class="nav_logo-name">Evaluasi Kinerja</span> </a>

                <div class="nav_list">
                    <a href="/superuser" id="dashboard" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>

                    <a href="/superuser/users" id="user" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span
                            class="nav_name">Users</span> </a>

                    <a href="/superuser/ppk" id="ppk" class="nav_link"> <i
                            class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">PPK</span> </a>

                    <a href="/superuser/paket-konstruksi" id="paketKonstruksi" class="nav_link"> <i
                            class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a>

                    <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span
                            class="nav_name">Files</span> </a>

                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                            class="nav_name">Stats</span> </a>
                </div>
            </div>

            <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <section>
        @yield('content')

    </section>
    <!--Container Main end-->




    <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/myStyle.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('js/dialog.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    {{-- <script src="{{ asset('js/myStyle.js') }}"></script> --}}
    @yield('script')
</body>

</html>
