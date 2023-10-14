<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <base href="/public"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @include('sweetalert::alert')
    <!-- Header Start -->
        @include('home.header')
    <!-- Header End -->

    @if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('message') }}
    </div>
    @endif

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
                            <a href="detail.html" class="nav-item nav-link active">Cart</a>                    
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>           
                    </div>
                </nav>
            </div>
        </div>
    </div>

    {{-- Navbar Cart --}}
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>

    {{-- Cart --}}
 <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    <?php $totalprice=0; ?>
                    @foreach ($cart as $cart)
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle"><img src="/product/{{ $cart->image }}" alt=""
                                style="width: 50px;">{{ $cart->product_title }}</td>
                            <td class="align-middle">Rp . {{ $cart->price }}</td>
                            <td class="align-middle">
                                {{ $cart->quantity }}
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" onclick="confirmation(event)"
                                href="{{ url('remove_cart', $cart->id) }}">
                                <i class="fa fa-times"></i>
                            </td>               
                        </tr>
                        <?php $totalprice=$totalprice + $cart->price ?>
                        @endforeach                    
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">              
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>

                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">Rp . {{ $totalprice }}</h5>
                        </div>
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Payment</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="" class="custom-control-input" name="payment" id="directcheck">
                                        <a href="{{ url('/cash_order') }}" class="btn btn-block btn-primary my-3 py-3" for="directcheck">Direct Check</a>
                                    </div>
                                </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input">
                                        <a href="{{ url('/stripe',$totalprice ) }}" class="btn btn-block btn-primary my-3 py-3" for="banktransfer">Pay Using Card</a>
                                    </div>
                                </div>
                            </div>
                        {{-- <a href="{{ url('checkout') }}" class="btn btn-block btn-primary my-3 py-3"> Proceed To Checkout</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
        @include('home.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    {{-- Script Notif SweetAlert --}}
    <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');  
          console.log(urlToRedirect); 
          swal({
              title: "Are you sure to cancel this product",
              text: "You will not be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willCancel) => {
              if (willCancel) {
                 
                  window.location.href = urlToRedirect;
                 
              }  
  
          });
  
          
      }
  </script>

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

{{-- tombol delete --}}
{{-- <a onclick="return confirm('Are You Sure Want To Remove This Product?')" href="{{ url('/remove_cart', $cart->id) }}"></a> --}}



{{-- Tanda X --}}
{{-- <td class="align-middle">
    <button class="btn btn-sm btn-primary">                                
    <i class="fa fa-times" ></i>
    </button>
</td> --}}