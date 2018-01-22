@extends('layouts.app')
 
@section('content')
<div class="example">
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Category Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('category-maintain')
	            <a class="button success" href="{{ route('categories.create') }}"> Create New Category</a>
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
			<th>Name</th>
			<th>Description</th>
			<th>Status</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($categories as $key => $category)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $category->display_name }}</td>
		<td>{{ $category->description }}</td>
		<td>
			@if ($category->status == 1)
				<label class="label label-success">Active</label>
			@else
				<label class="label label-danger">Non-Active</label>
			@endif
		</td>
		<td>
			<a class="button info" href="{{ route('categories.show',$category->id) }}">Show</a>
			@permission('role-edit')
			<a class="button primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
			@endpermission
			@permission('role-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'button danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $categories->render() !!}
</div>
@endsection