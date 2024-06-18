<head> <meta charset="utf-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<title> @yield('title')</title>

</head>

<body>

<div class="container">

 <!-- Sidebar -->
 <div class="sidebar" style="width: 250px;">
        <div class="px-3">
        @if( Auth::guard('admin')->check())
        <h4>Chào {{Auth::guard('admin')->user()->name}}</h4>
        @else 
            <h2 class="my-4">Admin</h2>
        @endif
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/producer">Producer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/product">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/user">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/logout" ng-click="logout()">Logout</a>
                </li>
            </ul>
        </div>
    </div>

<main>

@yield('content')

</main>

</div>

</body>
<style>
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100; /* Ensure it's on top of the content */
            padding: 60px 0; /* Adjust as needed */
            background-color: #343a40; /* Adjust sidebar background color */
            color: #fff; /* Adjust sidebar text color */
            width: 150px;
        }
        .sidebar .nav-link {
            color: #fff; /* Adjust sidebar link text color */
        }

        /* Content styles */
        .content {
            margin-left: 150px; /* Adjust based on sidebar width */
            padding: 20px; /* Adjust content padding */
        }
    </style>