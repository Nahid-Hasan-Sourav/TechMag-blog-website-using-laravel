@extends('master')

@section('body')
    <div class="body">
        <div class="container">
            <div class="row py-5 px-4">
                <div class="col-md-12 mx-auto">
                    <!-- Profile widget -->
                    <div class="bg-white shadow rounded overflow-hidden">
                        {{-- https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80 --}}
                        <div class="px-4 pt-0 pb-4 cover"
                            style="background-image: url('{{ $userDetails->cover_image ? asset($userDetails->cover_image) : 'https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80' }}'); height:300px;">
                            <div class="media align-items-end profile-head">
                                <div class="profile mr-3">


                                    @if ($userDetails)
                                        <img src="{{ asset($userDetails->image) }}" alt="..." width="130"
                                            class="rounded mb-1 img-thumbnail">
                                    @endif

                                    {{-- <a href="#" class="btn btn-outline-dark btn-sm d-block">Edit profile</a> --}}

                                    {{-- {{ dd(Session::get('user_role')) }} --}}

                                    @if (Session::get('user_role') == 'Blogger' ||
                                            Session::get('user_role') == 'User' ||
                                            Session::get('user_role') == 'Admin')
                                            @if(Session::get('user_id') === $userDetails->id)

                                            <a href="#" class="btn btn-outline-dark btn-sm d-block" id="edit-profile"
                                                data-id="{{ $userDetails->id }}">Edit profile</a>
                                            @endif
                                    @endif


                                </div>
                                <div class="media-body text-white ms-lg-4 ms-md-4 ms-sm-4 ms-4"
                                    style="margin-bottom: 5rem !important;">
                                    <h4 class="mt-0 mb-0">{{ $userDetails->name }}</h4>
                                    <p class="small mb-4"> <i class="fas fa-map-marker-alt d-inline-block"
                                            style="margin-right:6px !important"></i>New York</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light p-4 d-flex justify-content-end text-center mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <button type="submit" class="btn btn-primary follow-button mb-3">Follow</button>

                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">{{ $totalBlogs = $userAllBlog->count() }}
                                    </h5><small class="text-muted"> <i class="fa-solid fa-blog mr-1"></i>Blogs</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted"> <i
                                            class="fas fa-user mr-1"></i>Followers</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">340</h5><small class="text-muted"> <i
                                            class="fas fa-user mr-1"></i>Following</small>
                                </li>
                            </ul>
                        </div>
                        <div class="px-4 py-3">
                            <h5 class="mb-0">About</h5>
                            <div class="p-4 rounded shadow-sm bg-light">
                                {{-- <p class="font-italic mb-0">
                                    {{ $userDetails->about ?? ($userDetails->about ? $userDetails->about : 'User Will Update Soon') }}
                                </p> --}}



                                @if($userDetails->about)
                                <p class="font-italic mb-0">
                                    {{ $userDetails->about }}
                                </p>
                                @else
                                <p class="font-italic mb-0 font-bold">
                                    User Will Update Soon

                                </p>

                                @endif

                                {{-- <p class="font-italic mb-0">Lives in New York</p>
                                <p class="font-italic mb-0">Photographer</p> --}}
                            </div>
                        </div>
                        <div class="py-4 px-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="mb-0">Blogs</h5><a href="#" class="btn btn-link text-muted">Show
                                    all</a>
                            </div>
                            <div class="row">
                                @foreach ($userAllBlog as $blog)
                                    <div class="col-lg-4 mb-2 pr-lg-1">
                                        <div class="card">
                                            <img src="{{ asset($blog->image) }}" class="card-img-top " height="300"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ Str::limit($blog->blog_title, 20) }}
                                                </h5>
                                                <p class="card-text">
                                                    {{ Str::limit($blog->description, 100) }}
                                                </p>
                                            </div>

                                            <div class="card-body">
                                                <p>
                                                    <a href="{{ route('blog.details', ['id' => $blog->id]) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        ReadMore
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @if ($userAllBlog->total() > 5)
                                    <div class="row text-start pt-5 border-top">
                                        {{ $userAllBlog->links() }}
                                    </div>
                                @endif



                                {{-- <div class="col-lg-6 mb-2 pr-lg-1">
                                    <img
                                        src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                        alt="" class="img-fluid rounded shadow-sm">
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('home.userProfile.editProfileModal')
        </div>
    </div>
@endsection
