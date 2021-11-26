@extends('admin')

@section('title')
	User Management
@endsection

@section('content')

	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<th scope="row">{{ $user->id }}</th>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					<ul class="list-inline mb-0">
						<li class="list-inline-item"><a href="#" class="text-primary"><i class="fal fa-edit"></i> Edit</a></li>
						<li class="list-inline-item"><a href="#" class="text-success"><i class="fal fa-key"></i> Reset Password</a></li>
						<li class="list-inline-item"><a href="#" class="text-danger"><i class="fal fa-trash-alt"></i> Delete</a></li>
					</ul>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection
