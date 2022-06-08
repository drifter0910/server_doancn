<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <title>Dashboard</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!-- Offcanvas triggered -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--  -->
            <a class="navbar-brand" href="#">Admin DashBoard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lam
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Canvas -->
    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Link with href
    </a>
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">CORE</div>
                    </li>
                    <li>
                        <a href="{{route('dashboard')}}" class="nav-link px-3 active">
                            <i class="bi bi-speedometer2"></i>
                            <span>DashBoard</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="{{route('addproduct')}}" class="nav-link px-3 active">
                            <i class="bi bi-bag"></i>
                            <span>Add product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('checkout')}}" class="nav-link px-3 active">
                            <i class="bi bi-cart"></i>
                            <span>Checkout</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('allproduct')}}" class="nav-link px-3 active">
                            <i class="bi bi-cart"></i>
                            <span>All Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('addbanner')}}" class="nav-link px-3 active">
                            <i class="bi bi-cart"></i>
                            <span>Add banner</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('addnewfeed')}}" class="nav-link px-3 active">
                            <i class="bi bi-newspaper"></i>
                            <span>Add Newfeeds</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- off Canvas -->
    <main class=" pt-3">
        @yield('content')
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>