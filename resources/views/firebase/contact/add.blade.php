@extends('firebase.app')

@section('content')
<div class="container">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-dark text-white">
				Add New Contacts
				<a href="{{ route('contact.index')}}" class="btn btn-danger btn-sm float-end">Back List</a>
			</div>
			<div class="card-body">
				<form action="{{ route('contact.store')}}" method="POST" id="createStudentForm" autocomplete="off">
					@csrf
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
					</div>

					<div class="card-footer">
						<button type="submit" class="btn btn-success btn-block">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection