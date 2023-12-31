<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @php
        $product = DB::table('products')->where('status', '=', '1')->orderBy('id', 'DESC')->limit(6)->get();
    @endphp
    @foreach ($product as $row)
    <div class="col-sm-4" >
        <div class="product-image-wrapper" >
            <div class="single-products">
                    <div class="productinfo text-center" style="height: 350px;" >
                        <a href="{{ route('product.details',$row->id) }}">
                            <img src="{{ asset ($row->image)}}" alt=""   />
                        </a>
                        <h2>{{ $row->price }}৳</h2>
                        <p>{{ $row->title }}</p>
                        <form action="{{ route('add_to_cart',$row->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="1" />
                            <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </form>
                    </div>
                </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="{{ route('product.details',$row->id) }}"><i class="fa fa-plus-square"></i>View Product</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
    
    
</div>