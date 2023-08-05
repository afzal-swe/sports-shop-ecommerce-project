<div class="brands_products"><!--brands_products-->

    @php
        $brand = DB::table('brands')->where('brand_status', '=', '1')->limit(10)->get();
    @endphp


    <h2>Brands</h2>
    
    <div class="brands-name">
        @foreach ($brand as $row)
        <ul class="nav nav-pills nav-stacked">
            @php
                $count = DB::table('categories')->get();
            @endphp
            <li><a href="#"> <span class="pull-right">({{ count($count)}})</span>{{ $row->brand_name }}</a></li>
        </ul>
        @endforeach
    </div>
    
    
</div>