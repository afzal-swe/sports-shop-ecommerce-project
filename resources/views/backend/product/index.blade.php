@extends('backend.layouts.app')
@section('admin_content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Product ID</th>
                      <th>Product Price</th>
                      <th>Product Discount</th>
                      <th>Product Quantity</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                @foreach ($product as $key=>$row)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td class="center"><img src="{{ asset($row->image) }}" style="height:60px; width:60px;"></td>
                    <td class="center">{{ $row->title }}</td>
                    <td class="center">{{ $row->product_id }}</td>
                    <td class="center">{{ $row->price }}</td>
                    <td class="center">{{ $row->discount_price }} %</td>
                    <td class="center">{{ $row->quantity }}</td>
                    <td class="center">
                        @if ($row->status == '1')
                        <span class="label label-success">Active</span>
                        @else
                        <span class="label">Inactive</span>
                        @endif
                    </td>
                    <td class="center">
                        @if ($row->category_status == '1')
                            <a class="btn btn-success" href="#"><i class="fa-solid fa-toggle-on fa-xl" title="Unactive"></i></a>
                        @else
                            <a class="btn btn-label" href="#"><i class="fa-solid fa-toggle-off fa-xl" title="Active"></i></a>
                        @endif
                        <a class="btn btn-info" href="#"><i class="halflings-icon white edit" title="Edit"></i></a>
                        <a class="btn btn-danger" href="{{ route('product.destroy',$row->id) }}"><i class="halflings-icon white trash" title="Delete"></i></a>
                    </td>
                </tr>
                @endforeach
                
                
              </tbody>
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection