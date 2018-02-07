@extends('layouts.app')
 
@section('content')
<div class="example">
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Products</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('product-create')
	            <a class="button success" href="{{ route('products.create') }}"> Create New Item</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table striped bordered hovered">
		<tr>
			<th>No</th>
			<th>Title</th>
			<th>Description</th>
			<th>Image</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($products as $key => $product)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $product->name }}</td>
		<td>{{ $product->description }}</td>
		<td><img class="img-responsive img-circle" src="{{asset('storage/'.$product->image)}}" style="max-width:100px;"></td>
		<td>
			<a class="button info" href="{{ route('products.show',$product->id) }}">Show</a>
			@permission('product-edit')
			<a class="button primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
			@endpermission
			@permission('product-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'button danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $products->render() !!}
</div>
@endsection