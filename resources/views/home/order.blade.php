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

    <style type="text/css">

    .center
    {
        margin: auto;
        width: 70%;
        padding: 30px;
        text-align: center;
    }

    table,th,td
    {
        border: 1px solid black;
    }

    .th
    {
        padding: 10px;
        background-color: skyblue;
        font-size: 20px;
        font-weight: bold;
    }

    </style>






</head>

<body>
    <!-- Header Start -->
        @include('home.header')
    <!-- Header End -->

    {{-- Body --}}
    <div class="center">
        <table>
            <tr class="text-dark">
                <th class="th">Product Title</th>
                <th class="th">Quantity</th>
                <th class="th">Price</th>
                <th class="th">Payment Status</th>
                <th class="th">Delivery Status</th>
                <th class="th">Image</th>
                <th class="th">Cancel Order</th>
            </tr>

            @foreach ($order as $order)
            <tr>
                <td>{{ $order->product_title }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->delivery_status }}</td>
                <td>
                    <img height="150" width="180" src="product/{{ $order->image }}" alt="">
                </td>
                <td>
                    @if ($order->delivery_status=='processing')
                    <a onclick="return confirm('Are You Sure Want Cancel This Order?')"
                    class="btn btn-danger" href="{{ url('cancel_order',$order->id) }}">Cancel Order</a>
                    @else
                    <p style="">Not Allowed</p>                 
                    @endif
                </td>
            </tr>             
            @endforeach
        </table>
    </div>




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