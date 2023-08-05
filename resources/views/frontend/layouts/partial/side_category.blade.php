<div class="panel-group category-products" id="accordian"><!--category-productsr-->

    @php
        $category = DB::table('categories')
                    ->where('category_status', '=', '1')->limit(10)->get();

        $subcategory = DB::table('subcategories')
                        ->where('subcategory_status', '=', '1')->limit(10)->get();
    @endphp

    @foreach ($category as $row)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    {{ $row->category_name }}
                </a>
            </h4>
        </div>
        @if ($subcategory)
        <div id="sportswear" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <li><a href="#">Nike </a></li>
                    <li><a href="#">Under Armour </a></li>
                    <li><a href="#">Adidas </a></li>
                    <li><a href="#">Puma</a></li>
                    <li><a href="#">ASICS </a></li>
                </ul>
            </div>
        </div>
        @endif
    </div>
    @endforeach
    

    
</div>