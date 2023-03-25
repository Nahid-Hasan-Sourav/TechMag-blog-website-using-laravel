@extends('blogger.dashboard.master')

@section('rightContent')
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add New Blog</h4>
                    <h4 class="text-center text-success">
                        {{session('message')}}
                    </h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Blog Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" placeholder="" id="floatingTextarea"></textarea>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" >
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                {{--                               <div class="custom-control custom-checkbox mb-4">--}}
                                {{--                                   <input type="checkbox" class="custom-control-input" id="horizontal-customCheck">--}}
                                {{--                                   <label class="custom-control-label" for="horizontal-customCheck">Remember me</label>--}}
                                {{--                               </div>--}}

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Blog</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
