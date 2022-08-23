<div class="col-md-3">

    <div class="card admin text-white">
        <div class="card-header text-center" style="font-size:20px; font-weight: bold;"><i
                class="fas fa-tachometer-alt"></i> Admin Dashboard
        </div>
        <div class="card-body">

            <div class="list-group text-white text-center mt-n3" style="font-size:18px;">
                <li class="list-group-item adminimg"><img src="{{asset('avatar/admin.png')}}"
                                                          class="img-fluid rounded-circle admin-img" width="50%"></li>
                <li class="list-group-item"><a href="/admindashboard"><i class="fas fa-home"></i> Home</a></li>

                <li class="list-group-item"><a href="/admindashboard/all/users"><i class="fas fa-users"></i> Users
                    </a><i class="fas fa-caret-down"></i></li>

                <li class="list-group-item ml-5" style="font-size:12px;"><a href="/admindashboard/deactivated/users"><i
                            class="fas fa-toggle-on"></i> Restore User</a></li>

                <li class="list-group-item"><a href="/admindashboard/jobs"><i class="fas fa-briefcase"></i> Jobs</a>
                </li>

                <li class="list-group-item"><a href="/admindashboard/create"><i class="fas fa-blog"></i> Blog </a><i
                        class="fas fa-caret-down"></i></li>

                <li class="list-group-item ml-3" style="font-size:12px;"><a href="/admindashboard/posts"><i
                            class="fas fa-eye"></i> View Blog</a></li>

                <li class="list-group-item"><a href="/testimonial/create"><i class="fas fa-quote-right"></i> Testimonial
                    </a><i class="fas fa-caret-down"></i></li>

                <li class="list-group-item ml-5" style="font-size:12px;"><a href="/testimonial"><i
                            class="fas fa-eye"></i> View Testimonial</a></li>

                <li class="list-group-item"><a href="/admindashboard/reported/jobs"><i class="fas fa-flag"></i> Reported
                        Jobs</a></li>


                <li class="list-group-item"><a href="/admindashboard/trash"><i class="fas fa-trash-alt"></i> Trash</a>
                </li>


            </div>
        </div>
    </div>


    <style>
        .admin {
            background-color: #011069;
        }

        .list-group, .list-group-item {
            background-color: #011069;

        }

        .list-group-item:hover {
            background-color: grey;

        }

        .list-group, .list-group-item, a {
            color: #fff;
        }

        .list-group, .list-group-item, a:hover {
            color: #ffff;
        }

        .admin-img {
            background-color: darkgrey;
        }

        .adminimg, .tabhead, .blog-head {
            background-color: #011069;
        }

        .blog-border {
            border: 1px solid #011069 !important;
        }

        .btn-admin {
            background-color: #011069;
        }

        .btn-admin:hover {
            background-color: #1e34ba;
        }
    </style>
</div>
