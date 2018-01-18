@extends('layouts.app')
 
@section('content')
<div class="example">
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Users Management</h2>
	        </div>
	        <div class="pull-right">
	            <a class="button success" href="{{ route('users.create') }}"> Create New User</a>
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
			<th>Email</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
		@foreach ($data as $key => $user)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>
				@if(!empty($user->roles))
					@foreach($user->roles as $v)
						<label class="label label-success">{{ $v->display_name }}</label>
					@endforeach
				@endif
			</td>
			<td>
				<a class="button info" href="{{ route('users.show',$user->id) }}">Show</a>
				<a class="button primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
				{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
				{!! Form::submit('Delete', ['class' => 'button danger']) !!}
				{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
	</table>
	{!! $data->render() !!}
</div>
@endsection