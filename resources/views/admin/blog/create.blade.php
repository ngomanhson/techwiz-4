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
                                    <h2 class="h3 mb-0 page-title">Blog Create</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">

                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <form method="POST" action="{{url('admin/blog/store')}}" enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.components.notification')

                                    <div class="position-relative row form-group">
                                        <label for="image" class="col-md-3 text-md-right col-form-label">Image</label>
                                        <div class="col-md-9 col-xl-8">
                                            <input required type="file" name="image" id="image" class="form-control-file" onchange="previewImage(this);">
                                            <img id="image-preview" src="#" alt="Image Preview" style="max-width: 100%; display: none;">
                                            @error("image")
                                            <p class="text-danger"><i>{{$message}}</i></p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="user_id" class="col-md-3 text-md-right col-form-label">User Id</label>
                                        <div class="col-md-9 col-xl-8">
                                            <input required name="user_id" id="user_id" placeholder="Name" type="text" class="form-control" value="{{ $loggedInUserName }}" disabled>
                                            @error("product_category_id")
                                            <p class="text-danger"><i>{{$message}}</i></p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="title"
                                               class="col-md-3 text-md-right col-form-label">Title</label>
                                        <div class="col-md-9 col-xl-8">
                                            <input required name="title" id="title"
                                                   placeholder="Title" type="text" class="form-control" value="">
                                            @error("title")
                                            <p class="text-danger"><i>{{$message}}</i></p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="category"
                                               class="col-md-3 text-md-right col-form-label">Category</label>
                                        <div class="col-md-9 col-xl-8">
                                            <input required name="category" id="category"
                                                   placeholder="Category" type="text" class="form-control" value="">
                                            @error("category")
                                            <p class="text-danger"><i>{{$message}}</i></p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="subtitle"
                                               class="col-md-3 text-md-right col-form-label">subtitle</label>
                                        <div class="col-md-9 col-xl-8">
                                            <input required name="subtitle" id="subtitle"
                                                   placeholder="subtitle" type="text" class="form-control" value="">
                                            @error("subtitle")
                                            <p class="text-danger"><i>{{$message}}</i></p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="position-relative row form-group">
                                        <label for="description"
                                               class="col-md-3 text-md-right col-form-label">Description</label>
                                        <div class="col-md-9 col-xl-8">
                                            <textarea class="form-control" name="content" id="description" placeholder="Description"></textarea>
                                            @error("content")
                                            <p class="text-danger"><i>{{$message}}</i></p>
                                            @enderror
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
    <script>
        function previewImage(input) {
            const imagePreview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        }
    </script>
    <script src="https://cdn.ckeditor.com//4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection

