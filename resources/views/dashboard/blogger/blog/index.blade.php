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

                            <tr>
                                <th></th>
                                <td></td>
                                <th></th>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <td>

                                </td>

                                <td>
                                   <button class="btn btn-md btn-success" id="edit-blog-btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                   <button class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        @include('dashboard.includes.addModal')
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
