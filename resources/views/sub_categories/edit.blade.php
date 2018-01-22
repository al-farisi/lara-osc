@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Sub Category</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('sub_categories.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::model($sub_category, ['method' => 'PATCH','route' => ['sub_categories.update', $sub_category->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Parent Category:</strong>					
				{!! Form::select('category_id', $categories, $sub_category->category_id, array('class' => 'form-control')) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Is Active:</strong>
					{!! Form::checkbox('status', ($sub_category->status == null ? 0 : $sub_category->status)) !!}
				</div>
			</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Save</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection