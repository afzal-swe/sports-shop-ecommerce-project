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
                      <th>Brand Name</th>
                      <th>Slug</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                @foreach ($brand as $key=>$row)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td><img src="" alt="" style="height: 40px; width:40px;"></td>
                    <td class="center">{{ $row->brand_name }}</td>
                    <td class="center">{{ $row->brand_slug }}</td>
                    <td class="center">
                        @if ($row->brand_status == '1')
                        <span class="label label-success">Active</span>
                        @else
                        <span class="label">Inactive</span>
                        @endif
                    </td>
                    <td class="center">
                        @if ($row->brand_status == '1')
                            <a class="btn btn-success" href="{{ route('brand.active',$row->id) }}"><i class="fa-solid fa-toggle-on fa-xl" title="Unactive"></i></a>
                        @else
                            <a class="btn btn-label" href="{{ route('brand.unactive',$row->id) }}"><i class="fa-solid fa-toggle-off fa-xl" title="Active"></i></a>
                        @endif
                        <a class="btn btn-info" href="#"><i class="halflings-icon white edit"></i></a>
                        <a class="btn btn-danger" href="{{ route('brand.destroy',$row->id) }}"><i class="halflings-icon white trash"></i></a>
                    </td>
                </tr>
                @endforeach
                
                
              </tbody>
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection