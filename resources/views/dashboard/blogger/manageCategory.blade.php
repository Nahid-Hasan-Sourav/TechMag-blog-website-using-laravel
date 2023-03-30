@extends('dashboard.master')

@section('title')
    Manage Category
@endsection

@section('rightContent')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Categories</h4>
                    <h4 class="text-center text-success">
                        {{session('message')}}
                    </h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    <img src="{{asset($category->image)}}"
                                         height="30px",
                                         width="40px"
                                    />
                                </td>

                                <td>
                                   <div class="d-flex">
                                       <a href="{{route('edit.category', ['id'=>$category->id])}}" class="btn btn-success btn-sm">
                                           {{--                                        <i class="fa fa-edit"></i>--}}
                                           edit
                                       </a>

                                       {{--                                      delete using form--}}

                                       <form class="mx-2" action="{{route('delete.category', ['id'=>$category->id])}}" method='POST'
                                             onsubmit="return confirm('Are you sure you want to delete this ')">
                                           @csrf

                                           <button type='submit' class='btn btn-danger btn-sm'>
                                               {{--                                            <i class='fa fa-trash'></i>--}}
                                               delete
                                           </button>

                                       </form>


                                   </div>

                                    {{--                                    <a href="{{route('teacher.delete', ['id'=>$teacher->id])}}" class="btn btn-danger btn-sm">--}}
                                    {{--                                   <i class="fa fa-trash"></i>--}}
                                    {{--                                    </a>--}}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
