@extends('admin.layouts.admin')
@section('dashboard')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Post List</h4>
					</div>
					<div class="content table-responsive table-full-width">
						<table class="table table-striped">
							<thead>
								<th>N/S</th>
								<th>Title</th>
								<th>Created At</th>
								<th>Edit</th>
								<th>Delete</th>
							</thead>
							<tbody>
								@foreach($posts as $post)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $post->title }}</td>
									<td>{{ $post->created_at->diffForHumans() }}</td>
									<td><a class="btn btn-success" href="{{ route('edit', $post->id )}}">Edit</a></td>
									<td>
										<form id="form-data-{{$post->id}}" action='{{ route('posts.destroy', $post->id) }}' method='post' style="display: none;">
											{{csrf_field()}}
											{{method_field('DELETE')}}
										</form>
										<a class="btn btn-danger" href="" onclick="if (confirm('Are you sure you want to delete this?')) {
											event.preventDefault();
											document.getElementById('form-data-{{$post->id}}').submit();
										} else {
											event.preventDefault();}">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('admin.notify')
	@endsection

