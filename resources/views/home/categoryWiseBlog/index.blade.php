@extends('master')

@section('body')
    <div class="section search-result-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">Category: {{ $categoryDetails->first()->category->category_name }}</div>
                </div>
            </div>
            <div class="row posts-entry">
                <div class="col-lg-8">

                    @foreach ($categoryDetails as $details)
                        <div class="blog-entry d-flex blog-entry-search-item">
                            <a href="{{ route('blog.details', ['id' => $details->id]) }}" class="img-link me-4">
                                <img src="{{ asset($details->image) }}" alt="Image" class="img-fluid">
                            </a>
                            <div>
                                @php
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $details->created_at)->format('M. jS, Y');
                                @endphp


                                <span class="date">{{ $formattedDate }} &bullet; <a
                                        href="#">{{ $categoryDetails->first()->category->category_name }}</a></span>
                                <h2><a href="{{ route('blog.details', ['id' => $details->id]) }}">
                                        {{ Str::limit($details->blog_title, 50) }}</a></h2>
                                <p>{{ Str::limit($details->description, 100) }}</p>
                                <p><a href="{{ route('blog.details', ['id' => $details->id]) }}"
                                        class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    @endforeach
                    @if ($categoryDetails->total() > 5)
                        <div class="row text-start pt-5 border-top">
                            {{ $categoryDetails->links() }}
                        </div>
                    @endif





                </div>

                <div class="col-lg-4 sidebar">

                    <div class="sidebar-box search-form-wrap mb-4">
                        <form action="#" class="sidebar-search-form">
                            <span class="bi-search"></span>
                            <input type="text" class="form-control" id="s"
                                placeholder="Type a keyword and hit enter">
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach ($popularPost as $post)
                                    <li>
                                        <a href="{{ route('blog.details', ['id' => $post->id]) }}">
                                            <img src="{{ asset($post->image) }}" alt="Image placeholder" class="me-4 rounded">
                                            <div class="text">
                                                <h4> {{ Str::limit($details->blog_title, 50) }}</h4>
                                                <div class="post-meta">
                                                    @php
                                                        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $details->created_at)->format('M. jS, Y');
                                                    @endphp
                                                    <span class="mr-2">{{ $formattedDate }} </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('category-wise.blog', ['id' => $category->id]) }}">{{ $category->category_name }}
                                        <span>({{ \App\Helper\DatabaseHelper::getBlogCountByCategoryId($category->id) }})</span></a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Freelancing</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Freelancing</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
