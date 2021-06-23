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
			<h2><i class="halflings-icon user"></i><span class="break"></span>Category</h2>
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
					  <th>Description</th>
					  <th>Publication Status</th>
					  <th>actions</th>
				  </tr>
			  </thead> 
			  	@foreach($categories as $category)
			  		<tr>  
			  		<td>{{$category->id}}</td>
					<td class="center">{{$category->name}}</td>
					<td class="center">{!!$category->description!!}</td>
					<td class="center">
					@if($category->publication_status == 1)
						<span class="label label-success">Active</span>
						@else
						<span class="label label-danger">diabled</span>
						@endif
					</td>
					<td class="center">
						<a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">
						<i class="halflings-icon white edit"></i> 
						</a>
						
						<form style="display:inline" action="{{route('categories.delete',$category->id)}}" method="post">
							@csrf
							{{ METHOD_FIELD('delete')}}
							<button type="submit" class="btn btn-danger">
								<i class="halflings-icon white trash"></i> 
							</button>
						
						</form>
						
					</td>
					</tr>
					@endforeach
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

@stop