@extends('admin.layout.master')
@section('title','Blog')
@section('body')
    <!-- Main -->
    <main role="main" class="main-content">

        <div class="app-main__inner">

            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>
                            Product
                            <div class="page-title-subheading">
                                View, create, update, delete and manage.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">

                        <div class="card-body display_data">
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
                                <label for="product_category_id"
                                       class="col-md-3 text-md-right col-form-label">Title</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{$blogs->title}}</p>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Subtitle</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{$blogs->subtitle}}</p>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="content"
                                       class="col-md-3 text-md-right col-form-label">Content</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{!! $blogs->content !!}</p>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="price"
                                       class="col-md-3 text-md-right col-form-label">category</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{$blogs->category}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- End Main -->
@endsection

