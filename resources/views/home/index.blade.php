@extends('master')

@section('body')

    {{--slider start--}}
    <section>
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img  src="{{asset('/')}}img/blog-1.jpg" class="d-block w-100" alt="..."
                              style="height:300px !important;"
                        >
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img  src="{{asset('/')}}img/blog-1.jpg" class="d-block w-100" alt="..."
                              style="height:300px !important;"
                        >
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img  src="{{asset('/')}}img/blog-1.jpg" class="d-block w-100" alt="..."
                              style="height:300px !important;"
                        >
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    {{--slider end--}}

    {{--latest post start here--}}
    <section>
        <div class="container">
            <div class="row mt-5 mb-3 ">
                <div class="d-flex align-items-center justify-content-between">
                    <h2>Latest Post</h2>
                    <p><a href="#" class="text-decoration-none">See All </a> </p>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('/')}}img/blog-1.jpg" class="img-fluid">
                        <div class="card-body">
                            <h1>This is title</h1>
                            <p>This is details....<a href="" class="text-decoration-none text-danger">Read More</a> </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('/')}}img/blog-1.jpg" class="img-fluid">
                        <div class="card-body">
                            <h1>This is title</h1>
                            <p>This is details....<a href="" class="text-decoration-none text-danger">Read More</a> </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('/')}}img/blog-1.jpg" class="img-fluid">
                        <div class="card-body">
                            <h1>This is title</h1>
                            <p>This is details....<a href="" class="text-decoration-none text-danger">Read More</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--latest post end here---}}

    {{--service section start here---}}
    <section>
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-9">
                    <div id="carousel-1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="border rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-5"><img class="img-fluid profile h-100" src="{{asset('/')}}img/blog-1.jpg" ></div>
                                        <div class="col-md-7">
                                            <div class="bg-white p-2 px-3 testimonials">
                                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.&nbsp;<br>Duis aute irure dolor in reprehenderit.<br></p>
                                                <div class="d-flex justify-content-between stats border p-2">
                                                    <div class="d-flex flex-column align-items-center"><span class="fw-bold  text-danger">70%</span><span>Services</span></div>
                                                    <div class="d-flex flex-column align-items-center"><span class="fw-bold  text-success">180+</span><span>Stores</span></div>
                                                    <div class="d-flex flex-column align-items-center"><span class="fw-bold ">20+</span><span>Cities</span></div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3 text-success fw-bold"><span class="mr-2">Learn more</span><i class="fa fa-long-arrow-right"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="border rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-5"><img class="img-fluid profile" src="https://i.imgur.com/7YDXqMG.jpg" height="300"></div>
                                        <div class="col-md-7">
                                            <div class="bg-white p-2 px-3 testimonials">
                                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.&nbsp;<br>Duis aute irure dolor in reprehenderit.<br></p>
                                                <div class="d-flex justify-content-between stats border p-2">
                                                    <div class="d-flex flex-column align-items-center"><span class="font-weight-bold percentage text-danger">80%</span><span>Services</span></div>
                                                    <div class="d-flex flex-column align-items-center"><span class="font-weight-bold percentage text-success">280+</span><span>Stores</span></div>
                                                    <div class="d-flex flex-column align-items-center"><span class="font-weight-bold percentage text-">200+</span><span>Cities</span></div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3 text-success font-weight-bold"><span class="mr-2">Learn more</span><i class="fa fa-long-arrow-right"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="border rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-5"><img class="img-fluid profile" src="https://i.imgur.com/8s9FZSp.jpg" height="300"></div>
                                        <div class="col-md-7">
                                            <div class="bg-white p-2 px-3 testimonials">
                                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.&nbsp;<br>Duis aute irure dolor in reprehenderit.<br></p>
                                                <div class="d-flex justify-content-between stats border p-2">
                                                    <div class="d-flex flex-column align-items-center"><span class="font-weight-bold percentage text-danger">50%</span><span>Services</span></div>
                                                    <div class="d-flex flex-column align-items-center"><span class="font-weight-bold percentage text-success">1800+</span><span>Stores</span></div>
                                                    <div class="d-flex flex-column align-items-center"><span class="font-weight-bold percentage text-">200+</span><span>Cities</span></div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3 text-success font-weight-bold"><span class="mr-2">Learn more</span><i class="fa fa-long-arrow-right"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--service section end here---}}

    {{--featured post start here---}}
    <div class="container">
        <div class="row mt-5 mb-3 ">
            <div class="">
                <h2>Featured Post</h2>

            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('/')}}img/blog-1.jpg" class="img-fluid">
                    <div class="card-body">
                        <h1>This is title</h1>
                        <p>This is details....<a href="" class="text-decoration-none text-danger">Read More</a> </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('/')}}img/blog-1.jpg" class="img-fluid">
                    <div class="card-body">
                        <h1>This is title</h1>
                        <p>This is details....<a href="" class="text-decoration-none text-danger">Read More</a> </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('/')}}img/blog-1.jpg" class="img-fluid">
                    <div class="card-body">
                        <h1>This is title</h1>
                        <p>This is details....<a href="" class="text-decoration-none text-danger">Read More</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--featured post end here---}}

    {{--banner section start here---}}
    <div class="container">
        <div class="row my-5 bg-primary text-white p-2">
            <h5>This will be a banner part with image</h5>
        </div>
    </div>
    {{--banner section end here---}}



    <!-- footer start here -->
    <footer class="w-100 py-4 flex-shrink-0">
        <div class="container py-4 bg-light">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="h1 ">FB.</h5>
                    <p class="small ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <p class="small  mb-0">&copy; Copyrights. All rights reserved. <a class="text-primary" href="#">Bootstrapious.com</a></p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class=" mb-3">Quick links</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#" class="text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-decoration-none">About</a></li>
                        <li><a href="#" class="text-decoration-none">Get started</a></li>
                        <li><a href="#" class="text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class=" mb-3">Quick links</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#" class="text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-decoration-none">About</a></li>
                        <li><a href="#" class="text-decoration-none">Get started</a></li>
                        <li><a href="#" class="text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class=" mb-3">Newsletter</h5>
                    <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <form action="#">
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" id="button-addon2" type="button">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end here -->
@endsection
