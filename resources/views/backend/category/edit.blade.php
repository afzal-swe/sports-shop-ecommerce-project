@extends('backend.layouts.app')
@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Category Update Form</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{ route('category.update',$edit->id) }}" method="POST">
              @csrf


                <div class="control-group">
                  <label class="control-label" for="typeahead">Brand Name </label>
                  <div class="controls">
                    <select name="brand_id" id="" class="span6 typeahead">
                      <option selected>{{ $edit->brand->brand_name }}</option>
                      @foreach ($brand as $row)
                        <option value="{{ $row->id }}" >{{ $row->brand_name }}</option>
                      @endforeach

                      
                    </select>
                    
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Category Name </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="category_name" value="{{ $edit->category_name }}"><br>
                    
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Publication Status </label>
                  <div class="controls">
                    <input type="checkbox" class="span6 typeahead" id="typeahead" name="category_status" value="1">
                    
                  </div>
                </div>


                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
             
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection