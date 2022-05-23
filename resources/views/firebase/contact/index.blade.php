@extends('firebase.app')

@section('content')
<div class="container">
	<main class="mx-auto m-4">
		<div class="row">
			<div class="col-md-12">
				@if(session('status'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>{{ session('status')}}</strong>
					</button>
				</div>
				@endif
				<div class="card">
					<div class="card-header bg-dark text-white">
						Contacts List - Total : {{ $total_contacts}}
						<a href="{{ route('contact.add')}}" class="btn btn-primary btn-sm float-end">Add Contact</a>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-dark">
							<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">First Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Email</th>
									<th scope="col">Phone</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@php $i=1; @endphp
								@forelse($contacts as $key => $contact)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $contact['fname']}}</td>
									<td>{{ $contact['lname']}}</td>
									<td>{{ $contact['email']}}</td>
									<td>{{ $contact['phone']}}</td>
									<td>
									<a href="{{ route('contact.edit',$key) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('contact.delete',$key) }}" class="btn btn-danger" id="delete">Delete</a>
									</td>
								</tr>
								@empty
                                <tr>
									<th scope="row">No Record Found</th>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
<script type="text/javascript">

$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 2000);
});

</script>
@endsection