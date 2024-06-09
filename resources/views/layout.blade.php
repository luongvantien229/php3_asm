<head>
    <meta charset="UTF-8" />
    <meta name="viewsport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'home')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="{{ asset('images/VT.png') }}" alt="Your Alt Text" width="50px" />
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-dark">Trang chủ</a></li>
                <li><a href="/product" class="nav-link px-2 text-dark">Sản phẩm</a></li>
                <li><a href="/viewcart" class="nav-link px-2 text-dark">Giỏ hàng</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Danh mục
                    </a>
                    <ul class="dropdown-menu">
                        @foreach( $list_producer as $producer)
                        <li><a class="dropdown-item" href="/product/{{$producer->id}}">{{$producer->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="/contact" class="nav-link px-2 text-dark">Liên hệ</a></li>

            </ul>

            <form action="/product" method="GET" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input id="searchInput" type="search" name="query" class="form-control form-control-dark" placeholder="Tìm kiếm..." aria-label="Search" />
            </form>



            <div class="text-end">
                <button type="button" class="btn btn-outline-dark me-2">
                    <a class="" style="text-decoration: none;" href="/login">Đăng nhập</a>
                </button>
                <!-- <button type="button" class="btn btn-outline-dark me-2">
                    <a class="" style="text-decoration: none;" href="/forgot"></a>
                </button> -->
                <button type="button" class="btn btn-warning">
                    <a class="text-secondary" style="text-decoration: none" href="/register">Đăng kí</a>
                </button>
                <!-- <button type="button" class="btn btn-warning">
                    <a class="text-secondary" style="text-decoration: none">Logout</a>
                </button> -->
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/15/638513562910877298_F-H1_800x300.png" class="d-block w-100" alt="banner1">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/14/638512764494508959_F-H1_800x300.png" class="d-block w-100" alt="banner2">
                </div>
                <div class="carousel-item">
                    <img src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/20/638518185025784690_H1%20800X300-2.png" class="d-block w-100" alt="banner3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container" style="min-height: 350px;">
        @yield('content')
    </div>
    <hr>
    <div class="container mt-3">
        <div class="row">
            <div class="col col-sm-6 mb-6">
                <a href="/" class="d-flex align-items-center justify-content-center mb-3 link-dark text-decoration-none">
                    <img src="{{ asset('images/VT.png') }}" alt="VT Image" width="100px">
                </a>
                <p class="text-muted text-center">Cửa hàng công nghệ Văn Tiến</p>
            </div>

            <div class="col mb-3">
                <h5>Liên kết</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">Trang chủ</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">Chi tiết</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">Đăng nhập</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">Đăng kí</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">Liên lạc</a>
                    </li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Liên lạc</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">Facebook</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">Linked</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">Zalo</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">Intargram</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">SĐT: 0394608628</a>
                    </li>
                </ul>
            </div>


        </div>
    </div>
</body>