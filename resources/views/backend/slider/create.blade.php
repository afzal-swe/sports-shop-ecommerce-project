@extends('backend.layouts.app')
@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider Image</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
             @csrf

                     

                    <div class="control-group">
                        <label class="control-label" for="fileInput">File input</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input class="input-file uniform_on" name="slider_image" type="file">
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
                        <button type="submit" class="btn btn-primary">Add Slider</button>
                    </div>
                
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection