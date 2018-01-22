@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Show Sub Category</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('sub_categories.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name:</strong>
				{{ $sub_category->name }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Display Name:</strong>
                {{ $sub_category->display_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $sub_category->description }}
            </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parent Category:</strong>
                <label class="label label-info">{{ $parent_category->display_name }}</label>
            </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Status:</strong>
				@if($sub_category->status == 1)
				<label class="label label-success">Active</label>
				@else
				<label class="label label-danger">Non-Active</label>
				@endif
			</div>
		</div>
	</div>
@endsection