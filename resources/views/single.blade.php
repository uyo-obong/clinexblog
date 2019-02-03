@extends('layouts.app')

@section('master-navbar')
@endsection

@section('content')
<!-- Page Content -->
<div class="container">
	<div class="row">

		<!-- Post Content Column -->
		<div class="col-lg-8">

			<!-- Title -->
			<h1 class="mt-4">{{ $single->title }}</h1>

			<!-- Author -->
			<p class="float-left">by <a style="text-decoration: none;" href="#">{{ $single->author }}</a></p>
			<p class="float-right">Posted {{ $single->created_at->diffForHumans() }}</p>

			<hr>

			<!-- Preview Image -->
			<img class="img-fluid rounded" src="{{url('uploads/'.$single->image)}}" alt="">

			<hr>

			<!-- Post Content -->
			<p class="lead">{!! $single->content !!}</p>

			<hr>

			<!-- Single Comment -->
			
			

		</div>

		@include('inc.sidebar')
	</div>
</div>
@endsection