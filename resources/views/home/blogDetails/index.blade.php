@extends('master')

@section('body')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('{{ asset($details->image) }}')">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4">{{ $details->blog_title }}</h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 me-3 d-inline-block"><img
                                    src="{{ asset($details->user->image) }}" alt="Image" class="img-fluid"
                                    style="height:40px;width:40px"></figure>
                            <span class="d-inline-block mt-1">By {{ $details->user->name }}</span>
                            @php
                                $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $details->created_at)->format('F j, Y');
                            @endphp


                            <span>&nbsp;-&nbsp; {{ $formattedDate }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        @php
                            $limitedDescription = Str::limit($details->description, 1000);

                            $remainingDescription = substr($details->description, 1000);
                        @endphp
                        <p>{{ $limitedDescription }}</p>

                        <div class="row my-4">
                            <div class="col-md-12 mb-4">
                                <img src="{{ asset($details->image) }}" alt="Image placeholder" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6 mb-4">
                                <img src="{{ asset($details->image) }}" alt="Image placeholder" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6 mb-4">
                                <img src="{{ asset($details->image) }}" alt="Image placeholder" class="img-fluid rounded">
                            </div>
                        </div>
                        <p>{{ $remainingDescription }}</p>

                    </div>


                    <div class="pt-5">
                        <p>Categories: <a href="{{ route('category-wise.blog',['id'=>$details->category_id]) }}">{{ $details->category->category_name }}</a>

                        </p>
                    </div>


                    <div class="pt-5 comment-wrap">
                        <h3 class="mb-5 heading">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard">
                                    <img src="{{ asset('/') }}img/blog-1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="vcard">
                                    <img src="{{ asset('/') }}img/blog-1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard">
                                            <img src="{{ asset('/') }}img/blog-1.jpg" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>Jean Doe</h3>
                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                                laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                                enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                            </p>
                                            <p><a href="#" class="reply rounded">Reply</a></p>
                                        </div>


                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard">
                                                    <img src="{{ asset('/') }}img/blog-1.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>Jean Doe</h3>
                                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                        quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                        officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                        impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                                </div>

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard">
                                                            <img src="{{ asset('/') }}img/blog-1.jpg"
                                                                alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>Jean Doe</h3>
                                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                                autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                                Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                            <p><a href="#" class="reply rounded">Reply</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="vcard">
                                    <img src="{{ asset('/') }}img/blog-1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                            </li>
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap">
                        <form action="#" class="sidebar-search-form">
                            <span class="bi-search"></span>
                            <input type="text" class="form-control" id="s"
                                placeholder="Type a keyword and hit enter">
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="{{ asset($details->user->image) }}" alt="Image Placeholder"
                                class="img-fluid mb-3">
                            <div class="bio-body">

                                <h2>{{ $details->user->name }}</h2>
                                @if($details->user->about)
                                <p class="font-italic mb-0">
                                    {{ $details->user->about }}
                                </p>
                                @else
                                <p class="font-italic mb-0 font-bold">
                                    User Will Update Soon
                                </p>
                                
                                @endif

                                    <a href="{{ route('blogger.profile', ['id' => $details->user_id]) }}"
                                        class="btn btn-primary btn-sm rounded px-2 py-2">VIEW PROFILE</a></p>
                                <p class="social">

                                    <a href="#" class="p-2"><span class="fab fa-facebook-square"></span></a>
                                    <a href="#" class="p-2"><span class="fab fa-twitter-square"></span></a>
                                    <a href="#" class="p-2"><span class="fab fa-instagram-square"></span></a>
                                    <a href="#" class="p-2"><span class="fab fa-youtube-square"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                {{-- {{ dd($popularBlog) }} --}}
                                @foreach ($popularBlog as $blog)
                                    <li>
                                        <a href="{{ route('blog.details',['id'=>$blog->id]) }}">
                                            <img src="{{ asset($blog->image) }}" alt="Image placeholder"
                                                class="me-4 rounded">
                                            <div class="text">
                                                <h4>{{ Str::limit($blog->blog_title, 60) }}</h4>
                                                <div class="post-meta">
                                                    @php
                                                        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $details->created_at)->format('F j, Y');
                                                    @endphp


                                                    <span>{{ $formattedDate }}</span>
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
                            @foreach($categories as $category)
                                  <li><a href="{{ route('category-wise.blog',['id'=>$category->id]) }}">{{ $category->category_name }} <span>({{ \App\Helper\DatabaseHelper::getBlogCountByCategoryId($category->id) }})</span></a></li>
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
                <!-- END sidebar -->

            </div>
        </div>
    </section>


    <!-- Start posts-entry -->
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-uppercase text-black">More Blog Posts</div>
            </div>
            <div class="row">

                @foreach($moreBlogs as $blog)

                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="{{ route('blog.details',['id'=>$blog->id]) }}" class="img-link">
                            <img src="{{ asset($blog->image) }}" alt="Image" class="img-fluid" style="height: 200px">
                        </a>
                        @php
                        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $details->created_at)->format('F j, Y');
                        @endphp
                        <span>{{ $formattedDate }}</span>


                        <h2><a href="{{ route('blog.details',['id'=>$blog->id]) }}">{{ Str::limit($blog->blog_title, 50) }}</a></h2>
                        <p>{{ Str::limit($blog->description, 60) }}</p>
                        <p><a href="{{ route('blog.details',['id'=>$blog->id]) }}" class="read-more">Continue Reading</a></p>
                    </div>
                </div>


                @endforeach

            </div>
        </div>
    </section>
    <!-- End posts-entry -->


@endsection
