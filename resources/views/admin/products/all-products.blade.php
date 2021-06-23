@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Products</h2>
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
					  <th>id</th>
					  <th>Name</th>
					  <th>Brand</th>
					  <th>Category</th>
					  <th>Price</th>
					  <th>Size</th>
					  <th>Color</th>
					  <th>Description</th>
					  <th>Publication Status</th>
					  <th>Action</th>
				  </tr>
			  </thead>   
			  <tbody>
			  @foreach($products as $product)
				<tr>
					<td>{{$product->id}}</td>
					<td class="center">{{$product->product_name}}</td>
					<td class="center">{{$product->brand->manufactor_name}}</td>
					<td class="center">{{$product->category->name}}</td>
					<td class="center">{{$product->product_price}} $</td>
					<td class="center">{{$product->product_size}} ml</td>
					<td class="center">{{$product->product_color}}</td>
					<td class="center">{!!$product->product_description!!}</td>
					<td class="center">
						@if($product->publication_status == 1)
						<span class="label label-success">Active</span>
						@else
						<span class="label label-danger">desabled</span>

						@endif

					</td>
					<td>
					<a href="{{route('product.edit',$product->product_id)}}" class="btn btn-warning">Edit</a>
					<form style="display:inline" action="{{route('product.delete',$product->product_id)}}" method="post">
							@csrf
							{{ METHOD_FIELD('delete')}}
							<button type="submit" class="btn btn-danger">
								<i class="halflings-icon white trash"></i> 
							</button>
						
						</form>
					</td>
					</tr>
					@endforeach	
				
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

@stop