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
		<a href="#">Add Product</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Products</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="post" action="{{route('product.edit_post',$product->product_id)}}">
			{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="">Product Name</label>
				  <div class="controls">
					<input type="text" name="product_name" value="{{$product->product_name}}" class="input-xlarge " id="">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="textarea2">Product Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="product_description"  id="textarea2" rows="3">
                    {!!$product->product_description!!}
                    </textarea>
				  </div>
				</div>

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">select category</label>
				  <div class="controls">
				  <select name="category_id"  class="form-control" id="brand_id">
				  <option value=""> ---- select category -----</option>

						@foreach($categories as $category)
							<option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->name}}</option>
						@endforeach
						  </select>				  </div>
				</div>

				<div class="control-group hidden-phone">
				  <label class="control-label" for="brand_id">select brand</label>
				  <div class="controls">
				  		<select name="brand_id" class="form-control" id="brand_id">
						  <option value=""> ----- select brand -----</option>
						@foreach($brands as $brand)
							<option value="{{$brand->id}}" @if($product->manufactor_id == $brand->id) selected @endif>{{$brand->manufactor_name}}</option>
						@endforeach
						  </select>
				  </div>
				</div>

				<div class="control-group">
				<label class="control-label" for="price">Product Price</label>
				  <div class="controls">
					<input type="text" name="product_price" value="{{$product->product_price}}" class="input-xlarge" id="price">
				  </div>
				</div>

				<div class="control-group">
				<label class="control-label"  for="color">Product Color</label>
				  <div class="controls">
					<input type="text" name="product_color" value="{{$product->product_color}}" class="input-xlarge" id="color">
				  </div>
				</div>

				<div class="control-group">
          		<label class="control-label" for="">Product Size</label>
				  <div class="controls">
					<input type="text" value="{{$product->product_size}}" name="product_size" class="input-xlarge" id="">
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label" value="0" for="Publication">Publication Status</label>
				  <div class="controls">
					<input type="checkbox"  @if($product->publication_status == 1) checked @endif name="publication_status" class="input-xlarge" id="Publication">
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