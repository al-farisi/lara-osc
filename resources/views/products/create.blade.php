@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create New Item</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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
	{!! Form::open(array('route' => 'products.store','method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'required' => 'required')) !!}
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
                <strong>Price:</strong>
                {!! Form::number('price', 0, array('placeholder' => 'Price','class' => 'form-control', 'required' => 'required', 'step'=>'any')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
				<strong>Image:</strong>
                {!! Form::file('productimage', null, array('placeholder' => 'Image','class' => 'form-control', 'id'=>'productimage')) !!}
            </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
				<strong>Video Url:</strong>
                {!! Form::text('video_url', null, array('placeholder' => 'Video Url','class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <br/>
                @foreach($sub_categories as $value)
                	<label>{{ Form::checkbox('sub_category[]', $value->id, false, array('class' => 'name')) }}
						{{ $value->parent->display_name }} - {{ $value->display_name }}</label>
                	<br/>
                @endforeach
            </div>
		</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection