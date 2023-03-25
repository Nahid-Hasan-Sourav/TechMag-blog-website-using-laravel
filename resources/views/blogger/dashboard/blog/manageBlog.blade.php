@extends('blogger.dashboard.master')

@section('body')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Teachers Info</h4>
                    <h4 class="text-center text-success">
                        {{session('message')}}
                    </h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($allTeachers as $teacher)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$teacher->name}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->mobile}}</td>
                                <td>
                                    <img src="{{asset($teacher->image)}}"
                                         height="30px",
                                         width="40px"
                                    />
                                </td>

                                <td>
                                    <a href="{{route('teacher.edit', ['id'=>$teacher->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    {{--delete using form--}}

                                    <form action="{{route('teacher.delete', ['id'=>$teacher->id])}}" method='POST'
                                          onsubmit="return confirm('Are you sure you want to delete this ')"
                                    >
                                        @csrf

                                        <button type='submit' class='btn btn-danger btn-sm'>
                                            <i class='fa fa-trash'></i>
                                        </button>

                                    </form>
                                    {{--                                <a href="{{route('teacher.delete', ['id'=>$teacher->id])}}" class="btn btn-danger btn-sm"--}}

                                    {{--                                >--}}
                                    {{--                                    <i class="fa fa-trash"></i>--}}
                                    {{--                                </a>--}}
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

