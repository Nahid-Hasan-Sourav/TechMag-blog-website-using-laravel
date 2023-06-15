@extends('dashboard.master')

@section('rightContent')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Users</h4>
                    <h4 class="text-center text-success">
                        {{ session('message') }}
                    </h4>
                    @if ($allUser->isEmpty())
                        <p class="text-danger">No users found.</p>
                    @else
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach ($allUser as $user)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>

                                        <td>
                                            <img src="{{ asset($user->image) }}" height="30px", width="40px" />
                                        </td>

                                        <th>
                                            <a href="{{ route('blog.profile',['id'=>$user->id]) }}" class="btn btn-primary">VIEW </a>
                                        </th>

                                        <td>
                                            <div class="d-flex">
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
                            </tbody>
                        </table>
                    @endif



                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
