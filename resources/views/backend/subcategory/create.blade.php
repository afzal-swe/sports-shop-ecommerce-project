@extends('backend.layouts.app')
@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Sub-Category Add Form</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{ route('subcategory.store') }}" method="POST">
              @csrf


                <div class="control-group">
                  <label class="control-label" for="typeahead">Brand Name <samp class="text-danger">*</samp></label>
                  <div class="controls">
                    <select name="brand_id" id="" class="span6 typeahead @error('brand_id') is-invalid @enderror">
                      <option value="" disabled>Select Brand</option>
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
                  <label class="control-label" for="typeahead">Category Name <span class="text-danger" >*</span></label>
                  <div class="controls">
                    <select name="category_id" id="" class="span6 typeahead @error('category_id') is-invalid @enderror">
                      <option value="" disabled>Select Brand</option>
                      @foreach ($category as $row)
                        <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                      @endforeach

                      @error('category_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </select>
                    
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Sub-Category Name </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead @error('subcategory_name') is-invalid @enderror" id="typeahead" name="subcategory_name" placeholder="Sub Category Name"><br>
                    
                    @error('subcategory_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Publication Status </label>
                  <div class="controls">
                    <input type="checkbox" class="span6 typeahead" id="typeahead" name="subcategory_status" value="1">
                    
                  </div>
                </div>


                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Subcategory</button>
                </div>
             
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection