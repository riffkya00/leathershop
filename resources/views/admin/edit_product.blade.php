<!DOCTYPE html>
<html lang="en">
  <head>

    {{-- <base href="/public"> --}}
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

                <h2 class="font">Edit Product</h2>

                <form action="{{ url('/edit_product_confirm',$product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="product_design">
                    <label>Product Title : </label>
                    <input class="text_color" type="text" name="title" placeholder="Write a Title" required value="{{ $product->title }}">
                </div>
                <div class="product_design">
                    <label>Product Description : </label>
                    <input class="text_color" type="text" name="description" placeholder="Write a Description" required="" value="{{ $product->description }}">
                </div>
                <div class="product_design">
                    <label>Product Price : </label>
                    <input class="text_color" type="number" name="price" placeholder="Write a Price" required="" value="{{ $product->price }}">
                </div>
                <div class="product_design">
                    <label>Product Quantity : </label>
                    <input class="text_color" type="number" name="quantity" min="0" placeholder="Write a Quantity" required="" value="{{ $product->quantity }}">
                </div>
                <div class="product_design">
                    <label>Discount Price : </label>
                    <input class="text_color" type="number" name="dis_price" min="0" placeholder="Write a Discount Price" value="{{ $product->discount_price }}">
                </div>
                <div class="product_design">
                    <label>Product catagory : </label>
                    <select class="text_color" name="catagory" required="">
                        <option value=" {{ $product->catagory }}" selected="">{{ $product->catagory }}</option>
                        @foreach ($catagory as $catagory)
                        <option value="{{ $catagory->catagory_name }}">{{ $catagory->catagory_name }}</option>                                                    
                        @endforeach
                    </select>
                </div>
                <div class="product_design"> 
                    <label>Current Product Image : </label>
                    <img style="margin:auto;" height="100" width="100" src="/product/{{ $product->image }}">
                </div>
                <div class="product_design"> 
                    <label>Change Product Image : </label>
                    <input type="file" name="image" required="">
                </div>
                <div class="product_design">
                    <input type="submit" value="Update Product" class="btn btn-primary">
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