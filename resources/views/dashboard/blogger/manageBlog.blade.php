@extends('dashboard.master')

@section('rightContent')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All blogs Info</h4>
                    <h4 class="text-center text-success">
                        {{session('message')}}
                    </h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Blog title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$blog->blog_title}}</td>
                                <td>{{$blog->description}}</td>

                                <td>
                                    <img src="{{asset($blog->image)}}"
                                         height="30px",
                                         width="40px"
                                    />
                                </td>

                                <td>
                                    @foreach ($categories as $item)
                                        @if ($item['id'] === $blog->category_id)
                                            {{ $item['category_name'] }}
                                            @break
                                        @endif
                                    @endforeach
                                </td>


                                {{--                                <td>--}}
{{--                                    <a href="{{route('blog.edit', ['id'=>$blog->id])}}" class="btn btn-success btn-sm">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}

{{--                                    --}}{{--delete using form--}}

{{--                                    <form action="{{route('blog.delete', ['id'=>$blog->id])}}" method='POST'--}}
{{--                                          onsubmit="return confirm('Are you sure you want to delete this ')"--}}
{{--                                    >--}}
{{--                                        @csrf--}}

{{--                                        <button type='submit' class='btn btn-danger btn-sm'>--}}
{{--                                            <i class='fa fa-trash'></i>--}}
{{--                                        </button>--}}

{{--                                    </form>--}}
{{--                                    --}}{{--                                <a href="{{route('blog.delete', ['id'=>$blog->id])}}" class="btn btn-danger btn-sm"--}}

{{--                                    --}}{{--                                >--}}
{{--                                    --}}{{--                                    <i class="fa fa-trash"></i>--}}
{{--                                    --}}{{--                                </a>--}}
{{--                                </td>--}}
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

