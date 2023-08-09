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
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Product Name</th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                @foreach ($cart as $key=>$row)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td><img src="{{ asset($row->product->image) }}" alt="" style="height: 40px; width:40px;"></td>
                    <td class="center">{{ $row->user->name }}</td>
                    <td class="center">{{ $row->user->email }}</td>
                    <td class="center">Null</td>
                    <td class="center">{{ $row->product->title }}</td>
                    
                    <td class="center">
                        <a class="btn btn-label" href="#"><i class="fa-regular fa-eye" title="View"></i></a>
                        <a class="btn btn-info" href="#"><i class="halflings-icon white edit" title="Edit"></i></a>
                        <a class="btn btn-danger" href="#"><i class="halflings-icon white trash" title="Delete"></i></a>
                    </td>
                </tr>
                @endforeach
                
                
              </tbody>
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection