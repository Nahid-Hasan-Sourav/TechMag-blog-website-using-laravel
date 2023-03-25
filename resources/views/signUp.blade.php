@extends('master')

@section('body')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5 vh-100">
                <div class="card">
                    <form class="card-body " action="{{route('user.signUp')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                           <h4 class="fw-bold text-center">CRATE AN ACCOUNT</h4>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                                   name="name"
                                   placeholder="Name">
                        </div>


                        <div class="mb-3">
                            <input type="email" class="form-control" id="Username" aria-describedby="emailHelp"
                                   name="email"
                                   placeholder="email">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="Username" aria-describedby="emailHelp"
                                   name="password"
                                   placeholder="password">
                        </div>

                        <div class="form-group row mb-4 px-2">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" >
                            </div>
                        </div>

                        <div class="form-group row mb-4 px-3">
                            <select name="userRole" class="form-select " aria-label="Default select example">
                                <option selected>Select Your Role</option>
                                <option value="User" >User</option>
                                <option value="Blogger">Blogger</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>

                        <div class="text-center row my-4 px-3">
                            <button type="submit" class="btn btn-color px-5 mb-1 w-100 btn-success text-uppercase fw-bold">sign up</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
