<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Our Product</span></h2>
   
        {{-- Tombol Search Bawah --}}
        <br><br>
        <div>
            <form action="{{ url('product_search') }}" method="GET">
            @csrf
            <input style="width: 500px;" type="text" name="search" placeholder="Search Something Here">
            <input type="submit" value="search">
            </form>
        </div>
    </div>
    
    <div class="row px-xl-5 pb-3">
        @foreach ($product as $products)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="product/{{ $products->image }}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $products->title }}</h6>
                    <div class="d-flex justify-content-center">
                        @if ($products->discount_price!=null)
                        <h6 style="">Rp. {{ $products->discount_price }}</h6>
                        <h6 class="text-muted ml-2"><del>Rp. {{ $products->price }}</del></h6>
                        @else
                        <h6 style="">Rp. {{ $products->price }}</h6>
                        @endif
                    </div>
                </div>
    
                       
            <div class="card-footer d-flex justify-content-between bg-light border">
                <a href="{{ url('product_detail',$products->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>   
                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            </div>
            
            </div>    
        </div> 
        @endforeach
    </div>
    {{ ($product->withQueryString()->links('pagination::bootstrap-5')) }}
    </div>



{{-- 
    <form action="{{ url('add_cart',$products->id) }}" method="Post">
        @csrf            
        <div class="fas fa-shopping-cart text-primary mr-1">
            <input type="submit" class="btn btn-sm text-dark p-0" value="Add To Cart">
        </div>
    </form>  --}}


    {{-- Klik Add Chart CSRF --}}
    {{-- <form action="{{ url('add_cart',$products->id) }}" method="Post">
        @csrf            
           <div class="fas fa-shopping-cart text-primary mr-1">
               <input type="submit" class="btn btn-sm text-dark p-0" value="Add To Cart">
           </div> 
   </form>   --}}


                {{-- View detail dan add cart Template --}}
                {{-- <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ url('product_detail',$products->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>                 
                    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div> --}}

                {{-- View Detail Tutor yutup --}}
                {{-- <div class="row">
                    <div class="col-md-4">
                        <input type="number" name="quantity" value="1" min="1">
                    </div>
                </div>             
                    <div class="col-md-4">
                        <input type="submit" value="add To Cart">
                    </div> --}}




    {{-- <a href="{{ url('product_detail',$products->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>  
    <div class="row">
        <div class="col-md-4">
            <input type="number" name="quantity" value="1" min="1">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <input type="submit" value="add To Cart">
        </div>
    </div> --}}
    