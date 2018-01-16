@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Items CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('product-create')
	            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Item</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Title</th>
			<th>Description</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($products as $key => $product)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $product->name }}</td>
		<td>{{ $product->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
			@permission('product-edit')
			<a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
			@endpermission
			@permission('product-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $products->render() !!}
@endsection