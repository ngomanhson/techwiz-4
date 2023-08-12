@extends('admin.layout.master')
@section('title','Brand')
@section('body')
    <main role="main" class="main-content">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div class="col">
                                    <h2 class="h3 mb-0 page-title">Product Edit</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">

                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <form method="POST" action="{{route('blog.update',$blogs->id)}}">
                                    @csrf
                                    @include('admin.components.notification')
                                    <div class="position-relative row form-group">
                                        <label for="" class="col-md-3 text-md-right col-form-label">Images</label>
                                        <div class="col-md-9 col-xl-8">
                                            <ul class="text-nowrap overflow-auto" id="images">
                                                <li class="d-inline-block mr-1" style="position: relative;">
                                                    <img style="height: 150px;" src="{{$blogs->image}}"
                                                         alt="Image">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="title" class="col-md-3 text-md-right col-form-label">Title</label>
                                        <div class="col-md-9 col-xl-8">
                                            <input required name="title" id="title" placeholder="title" type="text"
                                                   class="form-control" value="{{$blogs->title}}">
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="subtitle"
                                               class="col-md-3 text-md-right col-form-label">Subtitle</label>
                                        <div class="col-md-9 col-xl-8">
                                            <input required name="subtitle" id="subtitle"
                                                   placeholder="subtitle" type="text" class="form-control" value="{{$blogs->subtitle}}">
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="category"
                                               class="col-md-3 text-md-right col-form-label">Category</label>
                                        <div class="col-md-9 col-xl-8">
                                            <input required name="category" id="category"
                                                   placeholder="category" type="text" class="form-control" value="{{$blogs->category}}">
                                        </div>
                                    </div>



                                    <div class="position-relative row form-group">
                                        <label for="description"
                                               class="col-md-3 text-md-right col-form-label">Description</label>
                                        <div class="col-md-9 col-xl-8">
                                            <textarea class="form-control" name="content" id="description" placeholder="description">{{$blogs->content}}</textarea>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group mb-1">
                                        <div class="col-md-9 col-xl-8 offset-md-2">
                                            <a href="admin/blog" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                                <span>Cancel</span>
                                            </a>

                                            <button type="submit" value="Save Change" class="btn btn-add btn-primary">Save Change</button>

                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>






                    </div> <!-- /.card-body -->
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main> <!-- main -->
    <script src="https://cdn.ckeditor.com//4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
