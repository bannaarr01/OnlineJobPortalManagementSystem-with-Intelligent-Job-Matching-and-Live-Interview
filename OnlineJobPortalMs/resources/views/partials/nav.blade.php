<!-- ======= Header Nav ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
            <h1><a href="/"><span><img src="{{ asset('template/assets/img/cropped.png') }}"
                                       style="width:50px;height:80px;"/> JobsVizor</span></a></h1>
        </div>
        <nav class="nav-menu d-none d-lg-block">
            <ul>

                <li><a href="/">Home</a></li>
                <li><a href="{{route('company')}}">Company</a></li>

                <li><a href="{{route('about')}}">About</a></li>

                <li><a href="{{route('faq')}}">Faq</a></li>
                @guest
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">{{ __('Sign Up') }}
                            </a></li>
                    @endif

                    @if (Route::has('login'))
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endif

                @else
                    @if(Auth::user()->user_type=='employer')
                        <li><a class="" href="{{ route('job.create') }}">Post a Job</a></li>
                    @endif

                    @if(Auth::user()->user_type=='siteadmin')
                        <li><a class="" href="{{route('admin.dashboard')}}">Manage Site</a></li>
                    @endif

                    <li class="drop-down"><a href="#">
                            @if(Auth::user()->user_type=='employer')
                                {{Auth::user()->company->cname}}
                            @endif

                            @if(Auth::user()->user_type=='seeker')
                                {{Auth::user()->name}}
                            @endif

                            @if(Auth::user()->user_type=='siteadmin')
                                {{Auth::user()->name}}
                            @endif
                        </a>
                        <ul>
                            @if(Auth::user()->user_type=='employer')
                                <li><a class="" href="{{route('home')}}">Dashboard</a></li>
                                <li><a href="{{ route('company.view') }}">{{ __('Company Profile') }} </a></li>
                                <li><a href="{{ route('myjob') }}">{{ __('My Job') }} </a></li>
                                <li><a href="{{ route('applicants') }}"> {{ __('Applicants') }} </a></li>

                            @elseif(Auth::user()->user_type=='seeker')
                                <li><a href="{{route('profile.view')}}">My Profile</a></li>
                                <li><a class="" href="{{route('home')}}">Dashboard</a></li>
                            @else
                                <li><a href="{{route('admin.dashboard')}}">Admin Dashboard</a></li>
                                <li><a href="{{route('admin.createBlog')}}">Create Blog</a></li>
                            @endif
                            @endguest
                        </ul>
                    </li>
            </ul>
        </nav><!-- .nav-menu -->

        @if(!Auth::check())
            <a class="get-started-btn scrollto" href="{{ route('employer.register') }}">{{ __('For Employers') }}
            </a>
        @endif

        @if(Auth::check())
            <a class="logout-btn" href="{{ route('logout') }}"
               onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
                {{ __('Logout') }} </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
            </form>
        @endif


        <style>
            /* LogOut Button */
            .logout-btn {
                margin-left: 25px;
                color: #fff;
                border-radius: 50px;
                padding: 6px 20px 7px 20px;
                white-space: nowrap;
                transition: 0.3s;
                font-size: 14px;
                display: inline-block;
                border: 2px solid #ff006a;
                font-weight: 600;
            }

            .logout-btn:hover {
                background: #3803B2;
                color: #fff;
                border: 2px solid #47b2e4;
            }

            @media (max-width: 768px) {
                .logout-btn {
                    margin: 0 48px 0 0;
                    padding: 6px 20px 7px 20px;
                }
            }

        </style>
</header><!-- End Header Nav-->

