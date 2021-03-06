@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2> Show Category</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name:</strong>
				{{ $category->name }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Display Name:</strong>
                {{ $category->display_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $category->description }}
            </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Status:</strong>
				@if($category->status == 1)
				<label class="label label-success">Active</label>
				@else
				<label class="label label-danger">Non-Active</label>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h3> Sub Categories</h3>
	        </div>
	    </div>
	</div>
	<table class="table striped bordered hovered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
		</tr>
	@foreach ($sub_categories as $key => $sub_category)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $sub_category->display_name }}</td>
		<td>{{ $sub_category->description }}</td>		
	</tr>
	@endforeach
	</table>
@endsection