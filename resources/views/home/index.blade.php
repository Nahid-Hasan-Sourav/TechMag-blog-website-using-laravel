@extends('master')

@section('body')
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">

                <div class="col-md-4">

                    @php
                        $cutBlogs = $blogs->slice(0, 2);
                    @endphp

                    @foreach ($cutBlogs as $index => $blog)
                        @php
                            $class = '';
                            if ($index == 0) {
                                $class = 'h-entry mb-30 v-height gradient';
                            } elseif ($index == 1) {
                                $class = 'h-entry v-height gradient';
                            }
                        @endphp

                        <a href="{{ route('blog.details',['id'=>$blog->id]) }}" class="{{ $class }}">
                            <div class="featured-img" style="background-image: url('{{ asset($blog->image) }}');"></div>
                            <div class="text">
                                @php
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('M. jS, Y');
                                @endphp
                                <span class="date">{{ $formattedDate }}</span>
                                <h2>{{ $blog->blog_title }}</h2>
                            </div>
                        </a>
                        {{-- <a href="{{ route('blog.details') }}" class="">
                            <div class="featured-img" style="background-image: url('{{ asset($blog->image) }}');"></div>
                        </a> --}}
                    @endforeach




                </div>

                <div class="col-md-4">
                    @php
                        $cutBlogsOne = $blogs->slice(2, 1);
                    @endphp


                    @foreach ($cutBlogsOne as $blog)
                        <a href="{{ route('blog.details',['id'=>$blog->id]) }}" class="h-entry img-5 h-100 gradient">

                            <div class="featured-img" style="background-image: url('{{ asset($blog->image) }}');">
                            </div>

                            <div class="text">
                                @php
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('M. jS, Y');
                                @endphp
                                <span class="date">{{ $formattedDate }}</span>
                                <h2>{{ $blog->blog_title }}</h2>
                            </div>
                        </a>
                    @endforeach

                </div>
                <div class="col-md-4">

                    @php
                        $cutBlogs = $blogs->slice(-2)->reverse();
                    @endphp

                    @foreach ($cutBlogs as $index => $blog)
                        @php
                            $class = '';
                            if ($index == 4) {
                                $class = 'h-entry mb-30 v-height gradient';
                            } elseif ($index == 3) {
                                $class = 'h-entry v-height gradient';
                            }
                        @endphp

                        <a href="{{ route('blog.details',['id'=>$blog->id]) }}" class="{{ $class }}">
                            <div class="featured-img" style="background-image: url('{{ asset($blog->image) }}');"></div>
                            <div class="text">
                                @php
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('M. jS, Y');
                                @endphp
                                <span class="date">{{ $formattedDate }}</span>
                                <h2>{{ $blog->blog_title }}</h2>
                            </div>
                        </a>

                    @endforeach



                </div>
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->


    <!-- Start fashion  posts-entry -->
    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h2 class="posts-entry-title">Fashion</h2>
                    </div>
                    <div class="col-sm-6 text-sm-end"><a href="{{ route('category-wise.blog',['id'=>'1']) }}"
                        class="read-more">View All</a></div>
                </div>

            </div>
            <div class="row g-3">


                <div class="col-md-9">



                    <div class="row g-3">
                        @php
                            $cutBlogsFashion = $fashions->slice(0, 2);

                        @endphp

                        @foreach ($cutBlogsFashion as $fashion)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="{{ route('blog.details',['id'=>$fashion->id]) }}" class="img-link">
                                        <img src="{{ asset($fashion->image) }}" alt="Image" class="w-100"
                                            style="height:200px">
                                    </a>

                                    @php
                                        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fashion->created_at)->format('M. jS, Y');
                                    @endphp
                                    <p class="date">{{ $formattedDate }}</p>

                                    <h2>
                                        <a href="{{ route('blog.details',['id'=>$fashion->id]) }}">
                                            {{ Str::limit($fashion->blog_title, 50) }}
                                        </a>
                                    </h2>
                                    <p>
                                        {{ Str::limit($fashion->description, 160) }}
                                    </p>
                                    <p>
                                        <a href="{{ route('blog.details',['id'=>$fashion->id]) }}" class="btn btn-sm btn-outline-primary">
                                            ReadMore
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>


                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        @php
                            $cutBlogsLastThree = $blogs->slice(-3)->reverse();
                        @endphp

                        @foreach ($cutBlogsLastThree as $fashion)
                            <li>
                                @php
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fashion->created_at)->format('M. jS, Y');
                                @endphp

                                <span class="date">{{ $formattedDate }}</span>

                                <h3>
                                    <a href="{{ route('blog.details',['id'=>$fashion->id]) }}">{{ $fashion->blog_title }}</a>
                                </h3>
                                <p>
                                    {{ Str::limit($fashion->description, 110) }}
                                </p>
                                <p><a href="{{ route('blog.details',['id'=>$fashion->id]) }}" class="read-more">Continue Reading</a></p>
                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End posts-entry -->

    {{-- Start latest  posts-entry --}}
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Latest</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href=""
        class="read-more">View All</a></div>
            </div>
            <div class="row">

                @foreach ($latests as $latest)
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-entry">
                            <a href="{{ route('blog.details',['id'=>$latest->id]) }}" class="img-link">
                                <img src="{{ asset($latest->image) }}" alt="Image" class="w-100" style="height:200px">
                            </a>
                            @php
                                $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latest->created_at)->format('M. jS, Y');
                            @endphp

                            <span class="date">{{ $formattedDate }}</span>
                            <h2>
                                <a href="{{ route('blog.details',['id'=>$latest->id]) }}">{{ Str::limit($latest->blog_title, 40) }}</a>
                            </h2>
                            <p> {{ Str::limit($latest->description, 110) }}</p>
                            <p><a href="{{ route('blog.details',['id'=>$latest->id]) }}" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    {{-- End latest  posts-entry --}}

    {{-- slider start --}}
    {{-- <section>
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
    </section> --}}
    {{-- slider end --}}

    {{-- latest post start here --}}
    {{-- <section>
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
    </section> --}}
    {{-- latest post end here- --}}

    {{-- service section start here- --}}
    {{-- <section>
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-9">
                    <div id="carousel-1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="border rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-5"><img class="img-fluid profile h-100"
                                                src="{{ asset('/') }}img/blog-1.jpg"></div>
                                        <div class="col-md-7">
                                            <div class="bg-white p-2 px-3 testimonials">
                                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                    ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse.&nbsp;<br>Duis aute irure dolor in
                                                    reprehenderit.<br></p>
                                                <div class="d-flex justify-content-between stats border p-2">
                                                    <div class="d-flex flex-column align-items-center"><span
                                                            class="fw-bold  text-danger">70%</span><span>Services</span>
                                                    </div>
                                                    <div class="d-flex flex-column align-items-center"><span
                                                            class="fw-bold  text-success">180+</span><span>Stores</span>
                                                    </div>
                                                    <div class="d-flex flex-column align-items-center"><span
                                                            class="fw-bold ">20+</span><span>Cities</span></div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3 text-success fw-bold"><span
                                                        class="mr-2">Learn more</span><i
                                                        class="fa fa-long-arrow-right"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="border rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-5"><img class="img-fluid profile"
                                                src="https://i.imgur.com/7YDXqMG.jpg" height="300"></div>
                                        <div class="col-md-7">
                                            <div class="bg-white p-2 px-3 testimonials">
                                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                    ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse.&nbsp;<br>Duis aute irure dolor in
                                                    reprehenderit.<br></p>
                                                <div class="d-flex justify-content-between stats border p-2">
                                                    <div class="d-flex flex-column align-items-center"><span
                                                            class="font-weight-bold percentage text-danger">80%</span><span>Services</span>
                                                    </div>
                                                    <div class="d-flex flex-column align-items-center"><span
                                                            class="font-weight-bold percentage text-success">280+</span><span>Stores</span>
                                                    </div>
                                                    <div class="d-flex flex-column align-items-center"><span
                                                            class="font-weight-bold percentage text-">200+</span><span>Cities</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3 text-success font-weight-bold">
                                                    <span class="mr-2">Learn more</span><i
                                                        class="fa fa-long-arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="border rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-5"><img class="img-fluid profile"
                                                src="https://i.imgur.com/8s9FZSp.jpg" height="300"></div>
                                        <div class="col-md-7">
                                            <div class="bg-white p-2 px-3 testimonials">
                                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                    ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse.&nbsp;<br>Duis aute irure dolor in
                                                    reprehenderit.<br></p>
                                                <div class="d-flex justify-content-between stats border p-2">
                                                    <div class="d-flex flex-column align-items-center"><span
                                                            class="font-weight-bold percentage text-danger">50%</span><span>Services</span>
                                                    </div>
                                                    <div class="d-flex flex-column align-items-center"><span
                                                            class="font-weight-bold percentage text-success">1800+</span><span>Stores</span>
                                                    </div>
                                                    <div class="d-flex flex-column align-items-center"><span
                                                            class="font-weight-bold percentage text-">200+</span><span>Cities</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3 text-success font-weight-bold">
                                                    <span class="mr-2">Learn more</span><i
                                                        class="fa fa-long-arrow-right"></i>
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
        </div>
    </section> --}}
    {{-- service section end here- --}}

    <!-- Start featured posts-entry -->
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Feature</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href=""
 class="read-more">View All</a></div>
            </div>
            <div class="row mt-2">

                @foreach ($features as $feature)
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-entry">
                            <a href="{{ route('blog.details',['id'=>$feature->id]) }}" class="img-link">
                                <img src="{{ asset($feature->image) }}" alt="Image" class="w-100" style="height:200px">
                            </a>
                            @php
                                $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $feature->created_at)->format('M. jS, Y');
                            @endphp

                            <p class="date">{{ $formattedDate }}</p>
                            <h2>
                                <a href="{{ route('blog.details',['id'=>$feature->id]) }}">{{ Str::limit($feature->blog_title, 40) }}</a>
                            </h2>
                            <p> {{ Str::limit($latest->description, 110) }}</p>
                            <p><a href="{{ route('blog.details',['id'=>$feature->id]) }}" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- End featured posts-entry -->

    <!-- Start technology posts-entry -->
    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Technology</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="{{ route('category-wise.blog',['id'=>6]) }}"
 class="read-more">View All</a></div>
            </div>

            <div class="row g-3">

                <div class="col-md-9 order-md-2">
                    <div class="row g-3">

                        @php
                            $cutTwo = $technologies->slice(0, 2);
                        @endphp

                        @foreach ($cutTwo as $technology)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="{{ route('blog.details',['id'=>$technology->id]) }}" class="img-link">
                                        <img src="{{ asset($technology->image) }}" alt="Image" class="img-fluid">
                                    </a>
                                    @php
                                        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $technology->created_at)->format('M. jS, Y');
                                    @endphp

                                    <p class="date">{{ $formattedDate }}</p>
                                    <h2>
                                        <a
                                            href="{{ route('blog.details',['id'=>$technology->id]) }}">{{ Str::limit($technology->blog_title, 40) }}</a>
                                    </h2>
                                    <p>{{ Str::limit($technology->description, 130) }}</p>
                                    <p><a href="{{ route('blog.details',['id'=>$technology->id]) }}" class="btn btn-sm btn-outline-primary">Read
                                            More</a></p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">

                        @php
                            $cutThree = $technologies->slice(-3)->reverse();
                        @endphp

                        @foreach ($cutThree as $technology)
                            <li>
                                @php
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $technology->created_at)->format('M. jS, Y');
                                @endphp

                                <p class="date">{{ $formattedDate }}</p>
                                <h3>
                                    <a
                                        href="{{ route('blog.details',['id'=>$technology->id]) }}">{{ Str::limit($technology->blog_title, 20) }}</a>
                                </h3>
                                <p>{{ Str::limit($technology->description, 80) }}</p>
                                <p><a href="{{ route('blog.details',['id'=>$technology->id]) }}" class="read-more">Continue Reading</a></p>
                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- this is sports --}}
    <section class="section">
        <div class="container">

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Sports</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="{{ route('category-wise.blog',['id'=>7]) }}"
 class="read-more">View All</a></div>
            </div>

            <div class="row">

                @foreach ($sports as $sport)
                    <div class="col-lg-4 mb-4">
                        <div class="post-entry-alt">
                            <a href="{{ route('blog.details',['id'=>$sport->id]) }}" class="img-link"><img
                                    src="{{ asset($sport->image) }}" alt="Image" class="img-fluid"></a>
                            <div class="excerpt">


                                <h2><a href="{{ route('blog.details',['id'=>$sport->id]) }}">{{ Str::limit($sport->blog_title, 37) }}</a>
                                </h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <figure class="author-figure mb-0 me-3 float-start"><img
                                            src="{{ asset($sport->user->image) }}" alt="Image" class="img-fluid">
                                    </figure>
                                    <span class="d-inline-block mt-1">By <a
                                            href="#">{{ $sport->user->name }}</a></span>
                                    {{-- <span>&nbsp;-&nbsp; July 19, 2019</span> --}}
                                    @php
                                        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $technology->created_at)->format('F j, Y');
                                    @endphp

                                    <span class="date">&nbsp;-&nbsp; {{ $formattedDate }}</span>

                                </div>

                                <p>{{ Str::limit($sport->description, 120) }}</p>
                                <p><a href="{{ route('blog.details',['id'=>$sport->id]) }}" class="read-more">Continue Reading</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

        </div>
    </section>



    {{-- this is music --}}
    <div class="section bg-light">
        <div class="container">

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Music</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="{{ route('category-wise.blog',['id'=>5]) }}"
 class="read-more">View All</a></div>
            </div>

            <div class="row align-items-stretch retro-layout-alt">
                {{-- right side one div --}}

                @php
                    $cutBlogsOne = $musics->slice(0, 1);
                @endphp

                @foreach ($musics as $music)
                    <div class="col-md-5 order-md-2">
                        <a href="{{ route('blog.details',['id'=>$music->id]) }}" class="hentry img-1 h-100 gradient">
                            <div class="featured-img" style="background-image: url('{{ asset($music->image) }}">
                            </div>
                            <div class="text">
                                @php
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $music->created_at)->format('F j, Y');
                                @endphp

                                <span class="date"> {{ $formattedDate }}</span>
                                <h2>{{ Str::limit($music->blog_title, 30) }}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach


                <div class="col-md-7">
                    @php
                        $cutBlogsOne = $musics->slice(1, 1);
                    @endphp

                    @foreach ($cutBlogsOne as $music)
                        <a href="{{ route('blog.details',['id'=>$music->id]) }}" class="hentry img-2 v-height mb30 gradient">
                            <div class="featured-img" style="background-image: url('{{ asset($music->image) }}');">
                            </div>
                            <div class="text text-sm">
                                @php
                                $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $music->created_at)->format('F j, Y');
                            @endphp

                            <span class="date"> {{ $formattedDate }}</span>
                                <h2>{{ Str::limit($music->blog_title, 40) }}</h2>
                            </div>
                        </a>
                    @endforeach

                    <div class="two-col d-block d-md-flex justify-content-between">

                        @php
                            $cutBlogsLastTwo = $musics->slice(-2)->reverse();
                        @endphp

                        @foreach($cutBlogsLastTwo as $music)

                        @php
                            $class = '';
                            if ($index == 3) {
                                $class = 'hentry v-height img-2 gradient';
                            } elseif ($index == 2) {
                                $class = 'hentry v-height img-2 ms-auto float-end gradient';
                            }
                        @endphp

                        <a href="{{ route('blog.details',['id'=>$music->id]) }}" class="{{ $class }}">
                            <div class="featured-img"
                                style="background-image: url('{{ asset($music->image) }}');"></div>
                            <div class="text text-sm">
                                @php
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $music->created_at)->format('F j, Y');
                                @endphp

                                <span class="date"> {{ $formattedDate }}</span>
                                <h2>{{ Str::limit($music->blog_title,27) }}</h2>
                            </div>
                        </a>
                        @endforeach


                        {{-- <a href="{{ route('blog.details') }}" class="hentry v-height img-2 ms-auto float-end gradient">
                            <div class="featured-img"
                                style="background-image: url('{{ asset('/') }}img/blog-1.jpg');"></div>
                            <div class="text text-sm">
                                <span>February 12, 2019</span>
                                <h2>Startup vs corporate: What job suits you best?</h2>
                            </div>
                        </a> --}}
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
