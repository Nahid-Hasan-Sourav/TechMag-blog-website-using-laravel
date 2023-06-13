@extends('dashboard.master')

@section('rightContent')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Blogs</h4>
                    <button class="btn btn-md btn-success add-new-blog-btn">Add New Blogs</button>
                </div>
                <div class="card-body">



                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Blog Title</th>
                            <th>Blog Description</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Latest Status</th>
                            <th>Features Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{ $blog->blog_title }}</td>
                                <th>{{ Str::limit($blog->description, 30) }}
                                </th>
                                <td>{{ $blog->category ? $blog->category->category_name : 'N/A' }}</td>
                                <td>
                                    <img src="{{asset($blog->image)}}"
                                    height="30px",
                                    width="40px"
                                    />
                                </td>
                                <td>
                                    @if ($blog->latest_status == "active")
                                    <button class="btn btn-success">Active</button>
                                @else
                                    <button class="btn btn-danger">Inactive</button>
                                @endif

                                </td>
                                <td>
                                    @if ($blog->features_status == "active")
                                    <button class="btn btn-success status-button" value="{{ $blog->id }}">Active</button>
                                    @else
                                    <button class="btn btn-danger status-button" value="{{ $blog->id }}">Inactive</button>
                                    @endif

                                    {{-- @if ($blog->latest_status == "active")
                                    <button class="btn btn-success status-button" data-blog-id="{{ $blog->id }}">Active</button>
                                    @else
                                    <button class="btn btn-danger status-button" data-blog-id="{{ $blog->id }}">Inactive</button>
                                    @endif --}}

                                </td>

                                <td>
                                   <button class="btn btn-md btn-success edit-blog-btn"  value="{{ $blog->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                                   <button class="btn btn-md btn-danger delete-blog-btn"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        @include('dashboard.includes.addModal')
        @include('dashboard.includes.editBlogModal')
    </div>
@endsection

{{-- <div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Add New Blog</h4>
        <h4 class="text-center text-success">
            {{session('message')}}
        </h4>

    </div>
</div> --}}






