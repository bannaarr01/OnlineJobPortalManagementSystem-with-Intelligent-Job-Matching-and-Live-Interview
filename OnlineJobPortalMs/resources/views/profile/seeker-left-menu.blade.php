<div class="col-md-3">

    <div class="card admin text-white">
        <div class="card-header text-center" style="font-size:20px; font-weight: bold;"><i
                class="fas fa-tachometer-alt"></i> Dashboard
        </div>
        <div class="card-body">


            <div class="list-group text-white text-center mt-n3" style="font-size:18px;">
                <li class="list-group-item img">
                    @if(empty(Auth::user()->profile->avatar))
                        <img src="{{asset('avatar/avatar.png')}}" class="img-fluid rounded-circle admin-img"
                             width="80%"/>
                    @else
                        <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}"
                             class="img-fluid rounded-circle admin-img" width="80%"/>
                    @endif
                    <br>

                    <!-- Upload Avatar -->
                    <form action="{{route('avatar')}}" method="post" enctype="multipart/form-data">@csrf
                        <input type="file" class="form-control bg-secondary mt-3" name="avatar">
                        <br>
                        <button class="btn btn-outline-light btn-sm float-right mt-n3" type="submit">Update</button>
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red;">{{$errors->first('avatar')}}</div>
                        @endif

                    </form>


                </li>
                <li class="list-group-item"><a href="/home"><i class="fas fa-heart"></i> Saved Jobs</a></li>
                <li class="list-group-item"><a href="/user/profile"><i class="fas fa-user"></i> Profile</a></li>

                <li class="list-group-item"><a href="/jobsapplied/applications"><i class="fas fa-layer-group"></i>
                        Applications</a></li>


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
