<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    {{-- Tulisan Add Product --}}
        <style type="text/css">
            .font
            {
                text-align: left;
                font-size: 40px;
                padding-top: 20px;
            }
        </style>

    {{-- Tulisan Add Product Tabel dibawahnya --}}
        <style type="text/css">
            .product_title
            {
                text-align: center;
                padding-bottom: 40px;
            }

            .text_color
            {
                color: black;
                padding-bottom: 20px;
            }

            label
            {
                display: inline-block;
                width: 200px;
            }

            .product_design
            {
                padding-bottom: 15px;
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

            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>

            @endif

            <div class="product_title">

                <h2 class="font">Add Product</h2>

                <form action="{{ url('/add_product') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="product_design">
                    <label>Product Title : </label>
                    <input class="text_color" type="text" name="title" placeholder="Write a Title" required="">
                </div>
                <div class="product_design">
                    <label>Product Description : </label>
                    <input class="text_color" type="text" name="description" placeholder="Write a Description" required="">
                </div>
                <div class="product_design">
                    <label>Product Price : </label>
                    <input class="text_color" type="number" name="price" placeholder="Write a Price" required="">
                </div>
                <div class="product_design">
                    <label>Product Quantity : </label>
                    <input class="text_color" type="number" name="quantity" min="0" placeholder="Write a Quantity" required="">
                </div>
                <div class="product_design">
                    <label>Discount Price : </label>
                    <input class="text_color" type="number" name="dis_price" min="0" placeholder="Write a Discount Price">
                </div>
                <div class="product_design">
                    <label>Product catagory : </label>
                    <select class="text_color" name="catagory" required="">
                        <option value="" selected="">Add Catagory Here</option>
                        @foreach ($catagory as $catagory)
                        <option value="{{ $catagory->catagory_name }}">{{ $catagory->catagory_name }}</option>                                                    
                        @endforeach
                    </select>
                </div>
                <div class="product_design"> 
                    <label>Product Image : </label>
                    <input type="file" name="image" required="">
                </div>
                <div>
                    <input type="submit" value="Add Product" class="btn btn-primary">
                </div>
            </form>

        </div>
        </div>
      </div>

        <!-- main-panel ends -->

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>