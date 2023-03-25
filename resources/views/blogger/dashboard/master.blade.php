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
                           <h5>Nahid Hasan Sourav</h5>
                           <div>
                               <p>Bloger</p>
                           </div>
                       </div>
                   </div>
                    <hr>

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


                </div>
                <div class="col-md-9 border">
                    @yield('rightContent')
                </div>
            </div>
        </div>
    </section>
@endsection



