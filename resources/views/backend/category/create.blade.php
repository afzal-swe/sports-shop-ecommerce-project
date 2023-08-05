@extends('backend.layouts.app')
@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Category Add Form</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{ route('category.store') }}" method="POST">
              @csrf


                <div class="control-group">
                  <label class="control-label" for="typeahead">Brand Name </label>
                  <div class="controls">
                    <select name="brand_id" id="" class="span6 typeahead @error('brand_id') is-invalid @enderror">
                      <option value="" disabled selected>-- Choose Brand --</option>
                      @foreach ($brand as $row)
                        <option value="{{ $row->id }}">{{ $row->brand_name }}</option>
                      @endforeach

                      @error('brand_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </select>
                    
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Category Name </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead @error('category_name') is-invalid @enderror" id="typeahead" name="category_name" placeholder="Category Name"><br>
                    
                    @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Publication Status </label>
                  <div class="controls">
                    <input type="checkbox" class="span6 typeahead" id="typeahead" name="category_status" value="1">
                    
                  </div>
                </div>


                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
             
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection