<div class="col-md-3">

    <div class="card admin text-white">
        <div class="card-header text-center" style="font-size:20px; font-weight: bold;"><i
                class="fas fa-tachometer-alt"></i> Dashboard
        </div>
        <div class="card-body">


            <div class="list-group text-white text-center mt-n3" style="font-size:18px;">
                <li class="list-group-item img">
                    @if(empty(Auth::user()->company->logo))
                        <img src="{{asset('avatar/company.png')}}" class="img-fluid rounded-circle admin-img"
                             width="80%"/>
                    @else
                        <img src="{{asset('uploads/logo/')}}/{{Auth::user()->company->logo}}"
                             class="img-fluid rounded-circle admin-img" width="80%"/>
                    @endif
                    <br>
                    <!--Update Company Logo-->
                    <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">@csrf

                        <input type="file" class="form-control bg-secondary mt-3" name="company_logo">
                        <br>
                        <button class="btn btn-outline-light btn-sm float-right mt-n3" type="submit">Update</button>
                        @if($errors->has('company_logo'))
                            <div class="error" style="color: red;">{{$errors->first('company_logo')}}</div>
                        @endif
                    </form>


                </li>
                <li class="list-group-item"><a href="/company/create"><i class="fas fa-user"></i> Profile</a></li>

                <li class="list-group-item"><a href="/jobs/create"><i class="fas fa-check-double"></i> Post a Job</a>
                </li>

                <li class="list-group-item"><a href="/jobs/myjob"><i class="fas fa-briefcase"></i> My Jobs</a></li>

                <li class="list-group-item"><a href="/jobsposted/applications"><i class="fas fa-users"></i>
                        Applicants</a></li>
                <li class="list-group-item"><a href="/interviews-scheduled/records"><i class="fas fa-rocket"></i>
                        Interview</a></li>


            </div>
        </div>
    </div>


    <style>
        .admin {
            background-color: #3803B2;
        }

        .list-group, .list-group-item {
            background-color: #3803B2;

        }

        .list-group-item:hover {
            background-color: #1d2124;

        }

        .list-group, .list-group-item, a {
            color: #fff;
        }

        .list-group, .list-group-item, a:hover {
            color: #ffff;
        }

        .admin-img {
            background-color: #fff;
        }

        .img, .tabhead, .blog-head {
            background-color: #011069;
        }

        .blog-border {
            border: 1px solid #011069 !important;
        }

        .btn-admin {
            background-color: #011069;
            #1e34ba
        }

        .btn-admin:hover {
            background-color: #1e34ba;
        }
    </style>
</div>
