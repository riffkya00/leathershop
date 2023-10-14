<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    {{-- Tulisan Order --}}
    <style type="text/css">

    .center
    {
        margin: auto;
        width: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }

    .font
    {
        text-align: left;
        font-size: 40px;
        padding-top: 20px;
    } 

    .header
    {
        background:  skyblue;
    }

    .body
    {
        padding: 30px;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- Side Bar -->
      @include('admin.sidebar')

      <!-- Header -->
      @include('admin.header')

      <!-- Body -->
      <div class="main-panel">
        <div class="content-wrapper">

            <h2 class="font">All Orders</h2>
            {{-- Bagian Search --}}
            <div style="padding-left: 400px; padding-top: 50px; padding-bottom: 30px">          
                <form action="{{ url('search') }}" method="get">
                    @csrf
                <input type="text" style="color: black;" name="search" placeholder="Can I Help You?">
                <input type="submit" value="Search" class="btn btn-outline-primary">               
                </form>  
            </div>

            <table class="center">
            <tr class="header">
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Phone</th>
                <th style="padding: 10px;">Address</th>
                <th style="padding: 10px;">Product Title</th>
                <th style="padding: 10px;">Quantity</th>
                <th style="padding: 10px;">Price</th>
                <th style="padding: 10px;">Payment Status</th>
                <th style="padding: 10px;">Delivery Status</th>
                <th style="padding: 10px;">Image</th>
                <th style="padding: 10px;">Delivered</th>
                <th style="padding: 10px;">Print As PDF</th>
                <th style="padding: 10px;">Send Email</th>
            </tr>
            @forelse ($order as $order)
            <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                <td>
                        <img class="" src="/product/{{ $order->image }}">
                </td>
                <td>
                     @if($order->delivery_status=='processing')                        
                        <a href="{{ url('delivered',$order->id) }}" onclick="return confirm('Are You Sure This Product Is Delivered?')" class="btn btn-primary">Delivered</a>                    
                    @else
                        <p style="color: white;">Delivered</p>
                    @endif
                    </td>   
                <td>
                    <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-secondary">Print PDF</a>
                </td>
                <td>
                    <a href="{{ url('send_email',$order->id) }}" class="btn btn-info">Send Email</a>
                </td>
                </tr>   
                @empty    
                
                <tr>
                    <td colspan="16">
                        Data Not Found
                    </td>
                </tr>

                @endforelse
        </table>  
        </div>
      </div>

    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
