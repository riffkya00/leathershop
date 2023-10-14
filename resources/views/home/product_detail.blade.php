<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <base href="/public"> --}}
    <meta charset="utf-8">
    <title>Leather Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('home/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet">

    {{-- Jquery CDN Link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @include('sweetalert::alert')
    <!-- Header Start -->
    {{-- @include('home.header') --}}
    <!-- Header End -->

    {{-- Judul Start --}}
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Judul End -->


    <!-- Header Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">        
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                            <a href="shop.html" class="nav-item nav-link">Catagory</a>
                            <a href="detail.html" class="nav-item nav-link active">Shop Detail</a>                    
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>           
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->

        {{-- Pesan Add Cart --}}
        @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>  
        @endif

    <!-- Shop Detail -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Shop Detail -->



    <!-- Shop Detail Start -->   
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <img class="img-fluid w-100" src="/product/{{ $product->image }}" alt="">
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product->title }}</h3>           
                <h3 class="font-weight-semi-bold mb-4"></h3>
                 @if ($product->discount_price!=null)
                        <h4 style="">Price : Rp. {{ $product->discount_price }}</h4>
                        <h6 class="text-muted ml-2"><del>Rp. {{ $product->price }}</del></h6>
                        @else
                        <h6 style="">Price : Rp. {{ $product->price }}</h6>
                @endif
                <p class="mb-4">{{ $product->description }}</p>   
                <h5>Amount Available : {{ $product->quantity }}</h5>        
                <div class="d-flex align-items-center mb-4 pt-2">                
                    <div class="input-group quantity mr-3" style="width: 130px;">                  
                        <div class="input-group-btn">
                    <form action="{{ url('add_cart', $product->id) }}" method="Post">
                        @csrf 
                            <input type="number" name="quantity" class="form-control bg-secondary text-center" value="1" min="1">
                        </div>
                    </div>
                   
                        <div class="fas fa-shopping-cart text-primary mr-1">
                            <input type="submit" class="btn btn-sm text-dark p-0" value="Add To Cart">
                        </div>
                    </form> 
                </div> 
            </div>
        </div>     
    </div>
    <!-- Shop Detail End -->

    <!-- Footer Start -->
    @include('home.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


   <!-- JavaScript Libraries -->
    <script src="{{asset('home/https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('home/https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('home/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('home/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('home/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('home/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('home/js/main.js')}}"></script>
</body>
</html>