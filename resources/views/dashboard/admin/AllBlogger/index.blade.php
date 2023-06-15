@extends('dashboard.master')

@section('rightContent')
    <div class="row">

        <div class="col-12 table-responsive">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Blogger</h4>
                    <h4 class="text-center text-success">
                        {{ session('message') }}
                    </h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Profile</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>

                            @if ($allBlogger->isEmpty())
                                <p>No users found.</p>
                            @else
                            @foreach ($allBlogger as $blogger)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $blogger->name }}</td>

                                <td>
                                    <img src="{{ asset($blogger->image) }}" height="30px", width="40px" />
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('blogger.profile',['id'=>$blogger->id]) }}" class="btn btn-primary btn-md">VIEW</a>
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn-sm btn btn-primary"><span class="text-danger fw-bold fs-5">!</span>Verified</button>
                                </td>

                                <td>
                                    <div class="d-flex ">
                                        <a href="" class="btn btn-success btn-sm">
                                            {{--                                        <i class="fa fa-edit"></i> --}}
                                            edit
                                        </a>

                                        {{--                                      delete using form --}}

                                        <form class="mx-2" action="" method='POST'
                                            onsubmit="return confirm('Are you sure you want to delete this ')">
                                            @csrf

                                            <button type='submit' class='btn btn-danger btn-sm'>
                                                {{--                                            <i class='fa fa-trash'></i> --}}
                                                delete
                                            </button>

                                        </form>


                                    </div>
                                </td>

                            </tr>
                           @endforeach
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
