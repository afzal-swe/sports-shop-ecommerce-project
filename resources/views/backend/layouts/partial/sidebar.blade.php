<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="{{ route('dashboard') }}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	

            <li>
                @php
                    $brand = DB::table('brands')->get();
                @endphp
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Brands </span><span class="label label-info"> {{ count($brand) }} </span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('brand.create') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Brand</span></a></li>
                    <li><a class="submenu" href="{{ route('brand.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Manage Brand</span></a></li>
                </ul>	
            </li>

            <li>
                @php
                    $category = DB::table('categories')->get();
                @endphp
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Category </span><span class="label label-info"> {{ count($category) }} </span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('category.create') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Category</span></a></li>
                    <li><a class="submenu" href="{{ route('category.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Manage Category</span></a></li>
                </ul>	
            </li>

            <li>
                @php
                    $subcategory = DB::table('subcategories')->get();
                @endphp
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Sub-category </span><span class="label label-info"> {{ count($subcategory) }} </span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('subcategory.create') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Sub-category</span></a></li>
                    <li><a class="submenu" href="{{ route('subcategory.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Manage Sub-category</span></a></li>
                </ul>	
            </li>

            <li>
                @php
                    $product = DB::table('products')->get();
                @endphp
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Product </span><span class="label label-info"> {{ count($product) }} </span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('product.create') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add New Product </span></a></li>
                    <li><a class="submenu" href="{{ route('product.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Manage Product </span></a></li>
                </ul>	
            </li>

            <li>
                @php
                    $cart = DB::table('carts')->get();
                @endphp
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Cart </span><span class="label label-info"> {{ count($cart) }} </span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('cart.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Manage Add to Cart </span></a></li>
                </ul>	
            </li>

            <li>
                @php
                    $slider = DB::table('sliders')->get();
                @endphp
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Slider </span><span class="label label-info"> {{ count($slider) }} </span></a>
                <ul>
                    <li><a class="submenu" href="{{ route('slider.create') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Slider </span></a></li>
                    <li><a class="submenu" href="{{ route('slider.index') }}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Manage Slider </span></a></li>
                </ul>	
            </li>

            <li>
               
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Shipping </span><span class="label label-info"> {{ count($slider) }} </span></a>
                <ul>
                    <li><a class="submenu" href="#"><i class="icon-file-alt"></i><span class="hidden-tablet"> Manage Shipping </span></a></li>
                    
                </ul>	
            </li>

            
            <li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Setting </span><span class="label label-info"> 3 </span></a>
                <ul>
                    <li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Social Link </span></a></li>
                    <li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Seo </span></a></li>
                    <li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Seo </span></a></li>
                    <li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Seo </span></a></li>
                </ul>	
            </li>

            <li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
        </ul>
    </div>
</div>