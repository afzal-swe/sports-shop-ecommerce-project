@extends('backend.layouts.app')
@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Product Added Form</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
             @csrf

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Name <span class="text-danger" > *</span> </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="span6 typeahead" name="title" placeholder="Product Name" required><br>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Brand  <span class="text-danger">*</span></label>
                        <div class="col-md-3 col-sm-4 col-xs-3">
                          <select name="brand_id" id="" class="span6 typeahead text-info" required>
                            <option value="" disabled selected>-- Choose Brand --</option>
                            @foreach ($brand as $row)
                              <option value="{{ $row->id }}">{{ $row->brand_name }}</option>
                            @endforeach
                          </select>
                          
                        </div>
                      </div>
                      
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category <span class="text-danger">*</span></label>
                        <div class="col-md-3 col-sm-4 col-xs-3">
                          <select name="category_id" id="" class="span6 typeahead text-info" required>
                            <option value="" disabled selected >-- Choose Category --</option>
                            @foreach ($brand as $row)
                              <option value="{{ $row->id }}" disabled>{{ $row->brand_name }}</option>
                              @foreach ($category as $row)
                                <option value="{{ $row->id }}"> -- {{ $row->category_name }}</option>
                              @endforeach
                            @endforeach
                          </select>
                          
                        </div>
                      </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Subcategory <span class="text-danger">*</span> </label>
                        <div class="col-md-3 col-sm-4 col-xs-3">
                          <select name="subcategory_id" id="" class="span6 typeahead text-info" required>
                            <option value="" disabled selected>-- Choose Subcagegory --</option>
                            @foreach ($brand as $row)
                              <option value="{{ $row->id }}" disabled>{{ $row->brand_name }}</option>
                              @foreach ($category as $row)
                                <option value="{{ $row->id }}" disabled> -- {{ $row->category_name }}</option>
                                @foreach ($subcategory as $row)
                                    <option value="{{ $row->id }}"> --- {{ $row->subcategory_name }}</option>
                                @endforeach
                              @endforeach
                            @endforeach
                          </select>
                          
                        </div>
                      </div>

                      

                      <div class="control-group">
                        <label class="control-label" for="typeahead">Product Price <span class="text-danger" > *</span> </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="span6 typeahead" name="price" placeholder="Product Price" required><br>
                        </div>
                    </div>

                      <div class="control-group">
                        <label class="control-label" for="typeahead">Product Quentity <span class="text-danger" > *</span> </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="span6 typeahead" name="quantity" placeholder="Product Qunatity" required><br>
                        </div>
                    </div>

                      <div class="control-group">
                        <label class="control-label" for="typeahead">Product Discount <span class="text-danger" > *</span> </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="span6 typeahead" name="discount_price" placeholder="Product Discount"><br>
                        </div>
                    </div>

                      <div class="control-group">
                        <label class="control-label" for="typeahead">Post Date <span class="text-danger" > *</span> </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="date" class="span6 typeahead " name="post_date" required><br>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError1">Tags</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" class="span6 typeahead" name="tags" placeholder="Product Tags" required><br>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Color <span class="text-danger" > *</span> </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="span6 typeahead " name="color" placeholder="Product Color"><br>
                        </div>
                    </div>

                      <div class="control-group">
                        <label class="control-label" for="typeahead">Size <span class="text-danger" > *</span> </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="span6 typeahead" name="size" placeholder="Product Size"><br>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Description</label>
                        <div class="controls">
                          <textarea class="cleditor" id="textarea2" rows="3" name="description"></textarea>
                        </div>
                      </div>


                    <div class="control-group">
                        <label class="control-label" for="fileInput">File input</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input class="input-file uniform_on" name="image" type="file">
                        </div>
                        <div class="control-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <img src="" alt="" style="height: 70px; width:90px; margin-top:5px;">
                            </div>
                        </div>
                    </div>

                    

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Publication Status </label>
                        <div class="controls">
                          <input type="checkbox" class="span6 typeahead" name="status" value="1">
                          
                        </div>
                      </div>
                      

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">add Product</button>
                    </div>
                
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection