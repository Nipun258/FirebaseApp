@extends('firebase.app')

@section('content')
<div class="container">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-dark text-white">
				Edit Contacts
				<a href="{{ route('contact.index')}}" class="btn btn-danger btn-sm float-end">Back List</a>
			</div>
			<div class="card-body">
				<form action="{{ route('contact.update',$key)}}" method="POST" id="createStudentForm" autocomplete="off">
					@csrf
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" class="form-control" id="first_name" name="first_name" value="{{ $editdata['fname']}}">
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name" value="{{ $editdata['lname']}}">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" id="phone" name="phone" value="{{ $editdata['phone']}}">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="{{ $editdata['email']}}">
					</div>

					<div class="card-footer">
						<button type="submit" class="btn btn-success btn-block">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection