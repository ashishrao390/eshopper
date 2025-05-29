<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="{{url('favicon.ico')}}" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('css/style.css')}}" rel="stylesheet"> 
    <style>
        .color-circle {
            width: 0.35cm;
            height: 0.35cm;
            border-radius: 50%;
            display: inline-block;
        }
        .w-5.h-5{
            width:25px;
        }
  </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="{{url('/')}}">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="{{url('/')}}">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="{{url('/')}}">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="{{url('/')}}">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="{{url('/')}}">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="{{url('/')}}">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="{{url('/')}}">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="{{url('/')}}">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{url('/')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="{{url('/')}}" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{url('/')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

   <!-- Navbar Start -->
   <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                            </div>
                        </div>
                        @foreach($weartypes as $weartype)
                            <a href="{{url('/shop/'.$weartype->weartypes_name)}}" class="nav-item nav-link">{{$weartype->weartypes_name}}</a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{url('/')}}" class="nav-item nav-link active">Home</a>
                            <a href="{{url('/shop')}}" class="nav-item nav-link">Shop</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{url('/cart')}}" class="dropdown-item">Shopping Cart</a>
                                    <a href="{{url('/checkout')}}" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="{{url('/contact')}}" class="nav-item nav-link">Contact</a>
                            @if(Auth::check())
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{url('/brand')}}" class="dropdown-item">Brand</a>
                                        <a href="{{url('/sizes')}}" class="dropdown-item">Sizes</a>
                                        <a href="{{url('/categories')}}" class="dropdown-item">Categories</a>
                                        <a href="{{url('/colors')}}" class="dropdown-item">Colors</a>
                                        <a href="{{url('/weartypes')}}" class="dropdown-item">Wear Types</a>
                                        <a href="{{url('/gender')}}" class="dropdown-item">Gender</a>
                                        <a href="{{url('/discounts')}}" class="dropdown-item">Discounts</a>
                                        <a href="{{url('/products')}}" class="dropdown-item">Products</a>
                                        <a href="{{url('/stock')}}" class="dropdown-item">Stock</a>
                                        <a href="{{url('/admin')}}" class="dropdown-item">Admin</a>
                                        <a href="{{url('/user')}}" class="dropdown-item">Users</a>
                                        <a href="{{url('/sales')}}" class="dropdown-item">Sales</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if(!Auth::check())
                            <div class="navbar-nav ml-auto py-0">
                                <a href="{{url('/login')}}" class="nav-item nav-link">Login</a>
                                <a href="{{url('/user/create')}}" class="nav-item nav-link">Register</a>
                            </div>
                        @else
                            <div class="navbar-nav ml-auto py-0">
                                <a href="{{url('/logout')}}" class="nav-item nav-link">Logout({{ Auth::user()->fname }} {{ Auth::user()->lname}})</a>
                            </div>
                        @endif
                    </div>
                </nav>