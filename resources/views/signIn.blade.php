@extends('master')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 ">
                <div class="card my-5">

                    <form class="card-body p-lg-5" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                                  alt="profile"
                            style="width:120px; height:120px; object-fit:cover;"
                            >
                            <h4 class="fw-bold my-2">Sign in here</h4>
                        </div>

                        <div class="mb-3 mt-3">
                            <input type="text" name="email" class="form-control" id="Username" aria-describedby="emailHelp"
                                   placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input name="password" type="password" class="form-control" id="password" placeholder="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-color px-5 mb-1 w-100 btn-success text-uppercase fw-bold">Login</button>
                        </div>
                        <small class="text-danger">
                            {{Session::get('message') }}
                        </small>
                        <div id="emailHelp" class="form-text text-center mb-2 text-dark">Don't have an account? <a href="{{route('signUp')}}" class="text-dark fw-bold"> Create an
                                Account</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
