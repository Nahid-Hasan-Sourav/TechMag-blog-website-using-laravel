@extends('master')

@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 border vh-100 bg-light ">
                   <div class="row mt-4">
                       <div class="text-center">
                           <img src="{{asset('/')}}img/profile-image.png" class="rounded-circle" alt="..."
                           style="height:60px; width:60px;"
                           >
                           <h5>{{Session::get('user_name')}}</h5>
                           <div>
                               <p>{{Session::get('user_role')}}</p>
                           </div>
                       </div>
                   </div>
                    <hr>
{{--                    BLOGGER MENU--}}
                    @if(Session::get('user_role')==='Blogger')
                    <div class="row mt-4">
                       <ul class="d-flex flex-column navbar-nav text-center px-3">
                           <li class="nav-item bg-primary text-white mb-3">
                               <a href="{{route('add.blog')}}" class="nav-link">ADD BLOG</a>
                           </li>
                           <li class="nav-item bg-primary text-white">
                               <a href="{{route('manage.blog')}}" class="nav-link">MANAGE BLOG</a>
                           </li>
                           <li class="nav-item bg-primary text-white my-3">
                               <a href="" class="nav-link">ADD BLOG CATEGORY</a>
                           </li>

                       </ul>
                    </div>
                    @endif
                    {{--                    User MENU--}}
                        @if(Session::get('user_role')==='User')
                    <div class="row mt-4">
                        <ul class="d-flex flex-column navbar-nav text-center px-3">
                            <li class="nav-item bg-primary text-white mb-3">
                                <a href="" class="nav-link">All Save</a>
                            </li>
                            <li class="nav-item bg-primary text-white">
                                <a href="" class="nav-link">SUGGESTED BLOG</a>
                            </li>


                        </ul>
                    </div>
                    @endif
{{--                    --}}{{--Admin menu--}}
                    @if(Session::get('user_role')==='Admin')
                    <div class="row mt-4">
                        <ul class="d-flex flex-column navbar-nav text-center px-3">
                            <li class="nav-item bg-primary text-white mb-3">
                                <a href="{{route('add.blog')}}" class="nav-link">ALL USERS</a>
                            </li>


                        </ul>
                    </div>
                    @endif

                </div>
                <div class="col-md-9 border">
                    @yield('rightContent')
                </div>
            </div>
        </div>
    </section>
@endsection



