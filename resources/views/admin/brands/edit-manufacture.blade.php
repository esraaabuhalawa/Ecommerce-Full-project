@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Add Brand</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Brands</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="post" action="{{route('brands.edit_post',$brand->id)}}">
			{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="manufactor_name">Brand Name</label>
				  <div class="controls">
					<input type="text" name="manufactor_name" class="input-xlarge " value="{{$brand->name}}" id="manufactor_name">
				  </div>
				</div>
          
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Brand Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="manufactor_description" id="textarea2" rows="3">
                    {{$brand->description}}
                    </textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" value="0" for="publication_status">Publication Status</label>
				  <div class="controls">
					<input type="checkbox" name="publication_status" class="input-xlarge" value=@if($brand->publication_status == 1) checked @endif id="publication_status">
				  </div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->
</div><!--/row-->

@stop