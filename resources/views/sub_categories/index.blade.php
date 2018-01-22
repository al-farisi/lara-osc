@extends('layouts.app')
 
@section('content')
<div class="example">
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Sub Category Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('category-maintain')
	            <a class="button success" href="{{ route('sub_categories.create') }}"> Create New Sub Category</a>
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
	@foreach ($sub_categories as $key => $sub_category)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $sub_category->display_name }}</td>
		<td>{{ $sub_category->description }}</td>
		<td>
			@if ($sub_category->status == 1)
				<label class="label label-success">Active</label>
			@else
				<label class="label label-danger">Non-Active</label>
			@endif
		</td>
		<td>
			<a class="button info" href="{{ route('sub_categories.show',$sub_category->id) }}">Show</a>
			@permission('role-edit')
			<a class="button primary" href="{{ route('sub_categories.edit',$sub_category->id) }}">Edit</a>
			@endpermission
			@permission('role-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['sub_categories.destroy', $sub_category->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'button danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $sub_categories->render() !!}
</div>
@endsection