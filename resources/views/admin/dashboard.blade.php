
@extends('admin.layouts.admin')
@section('dashboard')

<div class="content">
    <div class="container-fluid">
        <div class="row">
           {{--  <div class="col-lg-4 col-md-5">


           </div> --}}
           <div style="margin: 0 auto; margin-left: 15%;" class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title">New Post</h4>
                </div>
                <div class="content">
                    <form method="POST" action="{{ route('post') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control border-input"  name="title" placeholder="Enter your title here" maxlength = "100" value="{{ old('title') }}" required>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>contents</label>
                                    <textarea rows="10" id="mytextarea" class="form-control border-input" name="contents" placeholder="Here can be your description">{{ old('contents') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload File</label>
                                    <input type="file" class="form-control border-input" name="image" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
</div>

@include('admin.notify')
@endsection
