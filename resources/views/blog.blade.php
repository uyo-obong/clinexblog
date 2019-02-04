@extends('layouts.app')

@section('single_navbar')
@endsection

@section('content')

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4">Trending Posts</h1>
      <hr>

      <!-- Blog Post -->
      @foreach($blogs as $blog)
      <div class="card mb-4">
        <div class="card-title">
          <a style="text-decoration: none;" href="{{ route('single', $blog->id)}}">
            <img class="card-img-top float-left" src="{{url($blog->image)}}" alt="Image loading...">
            <h2 style="font-weight: 200;"> {{ $blog->title }}</h2>
          </a>
        </div>
        <div class="card-body">
          <p class="card-text">{!! str_limit($blog->content, "150", "") !!}
          <a style="text-decoration: none;" href="{{ route('single', $blog->id)}}">&rarr; Read More </a>
        </p>
          
        </div>
        <div class="card-footer text-muted">
          Posted {{ $blog->created_at->diffForHumans() }} by
          <a href="#">{{ $blog->author }}</a>
        </div>
      </div>
      @endforeach


      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>

    </div>

    @include('inc.sidebar')

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->



@endsection


