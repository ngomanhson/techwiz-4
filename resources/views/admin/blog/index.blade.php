@extends('admin.layout.master')
@section('title','Blog')
@section('body')
    <!-- Main -->
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h2 class="h3 mb-0 page-title">Product</h2>
                        </div>
                        <div class="col-auto">
                            <a href="./admin/blog/create" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Create</a>
                        </div>
                    </div>

                    <!-- table -->
                    @if(session('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
                    @endif

                    <div class="card shadow">
                        @if(isset($count[0]))
                            <div class="card-body">
                                <div class="analytic">
                                    <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Activated<span class="text-muted">({{ $count[0] }})</span></a
                                    > |
                                    <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Disable<span class="text-muted">({{ $count[1] }})</span></a>
                                </div>

                                <form method="POST" action="{{url('admin/blog/action')}}">
                                    @csrf @method('POST')
                                    <div class="form-action form-inline py-3">
                                        <select class="form-control mr-3" name="act">
                                            <option>Select</option>
                                            @foreach($list_act as $k => $act)
                                                <option value="{{$k}}">{{$act}}</option>
                                            @endforeach
                                        </select>
                                        <input type="submit" name="btn-search" value="Apply" class="btn btn-primary" />
                                    </div>

                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover table-checkall">
                                        <thead>
                                        <tr>
                                            <th>
                                                {{--                                                <input type="checkbox" name="checkall" />--}}
                                                <label class="input-check">
                                                    <input type="checkbox" name="checkall"  />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </th>
                                            <th class="text-center">ID</th>
                                            <th>Title</th>
                                            <th class="text-center">User_Id</th>
                                            <th class="text-center">Created_at</th>
                                            <th class="text-center">Updated_at</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if($blogs->total()>0) @foreach($blogs as $blog)
                                            <tr>
                                                <td>
                                                    <label class="input-check">
                                                        <input type="checkbox" name="list_check[]" value="{{$blog->id}}"  />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td class="text-center text-muted">#{{$blog->id}}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    @if(isset($blog->image))
                                                                        <img
                                                                            style="height: 60px"
                                                                            data-toggle="tooltip"
                                                                            title="Image"
                                                                            data-placement="bottom"
                                                                            src="{{$blog->image }}"
                                                                            alt="anh loi"
                                                                        />
                                                                    @else
                                                                        <img style="height: 60px" data-toggle="tooltip" title="Image" data-placement="bottom" src="front/img/hhhh.jpg" alt="Image Error" />
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$blog->title}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{$blog->user->first_name}} {{$blog->user->last_name}}</td>
                                                <td class="text-center"><div class="badge badge-warning mt-2">{{date('M d, Y',strtotime($blog->created_at))}}</div></td>
                                                <td class="text-center">
                                                    <div class="badge badge-success mt-2">{{date('M d, Y',strtotime($blog->updated_at))}}</div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('blog.show',$blog->id)}}" class="btn btn-hover-shine btn-outline-primary border-0 btn-sm"> Details </a>
                                                    <a
                                                        href="{{route('blog.edit',$blog->id)}}"
                                                        data-toggle="tooltip"
                                                        title="Edit"
                                                        data-placement="bottom"
                                                        class="btn btn-outline-warning border-0 btn-sm"
                                                    >
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                                    </a>
                                                    @if($status !== 'trash')
                                                        <a
                                                            href="{{route('delete_blog',$blog->id)}}"
                                                            class="btn btn-danger btn-sm rounded-0 text-white"
                                                            onclick="return confirm('Are you sure you want to delete ?')"
                                                            type="button"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Delete"
                                                        ><i class="fa fa-trash"></i
                                                            ></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        <tr>
                                            <td colspan="7"><p class="alert alert-warning">Search results are empty</p></td>
                                        </tr>
                                    @endif
                                </form>
                            </div>
                        @endif
                    </div>

                    <nav aria-label="Table Paging" class="my-3">
                        <ul class="pagination justify-content-end mb-0">
                            {{--                            {!! $product->appends(app("request")->input())->links("pagination::bootstrap-4") !!}--}}
                            @if ($blogs->lastPage() > 1)
                                <ul class="pagination">
                                    {{-- Nút Previous --}}
                                    @if ($blogs->currentPage() > 1)
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->url($blogs->currentPage() - 1) }}" aria-label="Previous">
                                                <span aria-hidden="true">Previous</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if ($blogs->currentPage() == 1)
                                        <li class="page-item active">
                                            <span class="page-link">1</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->url(1) }}">1</a>
                                        </li>
                                    @endif

                                    @if ($blogs->currentPage() > 4)
                                        <li class="page-item disabled">
                                            <span class="page-link">...</span>
                                        </li>
                                    @endif

                                    @for ($i = max(2, $blogs->currentPage() - 1); $i <= min($blogs->lastPage() - 1, $blogs->currentPage() + 1); $i++)
                                        @if ($blogs->currentPage() == $i)
                                            <li class="page-item active">
                                                <span class="page-link">{{ $i }}</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor

                                    @if ($blogs->currentPage() < $blogs->lastPage() - 3)
                                        <li class="page-item">
                                            <span class="page-link">...</span>
                                        </li>
                                    @endif

                                    @if ($blogs->currentPage() == $blogs->lastPage())
                                        <li class="page-item active">
                                            <span class="page-link">{{ $blogs->lastPage() }}</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->url($blogs->lastPage()) }}">{{ $blogs->lastPage() }}</a>
                                        </li>
                                    @endif

                                    @if ($blogs->currentPage() < $blogs->lastPage())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $blogs->url($blogs->currentPage() + 1) }}" aria-label="Next">
                                                <span aria-hidden="true">Next</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!-- .col-12 -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container-fluid -->
    </main>
    <!-- End Main -->
@endsection

