<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    {{-- Tulisan Show Product dan dibawahnya --}}
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

    .img_size
    {
        width: 150px;
        height: 150px;
    }
    
    .header
    {
        background:  blue;
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

      {{-- Notif Delete Sukses --}}
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>

            @endif

            <h2 class="font">All Product</h2>

            <table class="center">
                <tr class="header">
                    <th class="body">Product Title</th>
                    <th class="body">Description</th>
                    <th class="body">Catagory</th>
                    <th class="body">Quantity</th>
                    <th class="body">Price</th>
                    <th class="body">Discount Price</th>
                    <th class="body">Product Image</th>
                    <th class="body">Delete</th>
                    <th class="body">Edit</th>
                </tr>
                @foreach ($product as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->catagory }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</th>
                    <td>{{ $product->discount_price }}</th>
                    <td>
                        <img class="img_size" src="/product/{{ $product->image }}">
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete This?')" href="{{ url('delete_product',$product->id) }}">Delete</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{ url('edit_product',$product->id) }}">Edit</a>
                    </td>
                </tr>         
                @endforeach
            </table>
        </div>
      </div>


        <!-- main-panel ends -->
      </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>