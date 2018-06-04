<!-- Navigation -->
<style>
.navbar-bg-dark{
    background: #252525 !important;
}

.navbar-link a{
    color: #fff !important;
}
.main-navbar-link a{
    color: grey !important;
}
.main-navbar-link a:hover{
    color: grey !important;
    background: transparent !important;
}
.main-navbar-link a:active{
    color: grey !important;
    background: transparent !important;
}
.main-navbar-link a:focus{
    color: grey !important;
    background: transparent !important;
}
.sidebar ul li a.active{
    color: #25252591 !important;
    background: #fff !important;
    border-right: 2px solid #fff !important;
}
.sidebar ul li a:hover{
    color: #25252591 !important;
    background: #fff !important;
    border-right: 2px solid #fff !important;
}
.sidebar ul li a:active{
    color: #25252591 !important;
    background: #fff !important;
    border-right: 2px solid #fff !important;
}
.sidebar ul li a:focus{
    color: #25252591 !important;
    background: #fff !important;
    border-right: 2px solid #fff !important;
}
.sidebar ul li{
    border-style: none !important;
}
</style>
<nav class="navbar main-navbar-link navbar-bg-dark navbar-static-top navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header navbar-bg-dark">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <a href="#" class="navbar-logo pull-left"><img src="logo.png" alt="Gideon"></a>
                    <a class="text-white" href="#">Colibs College</a>
                </div>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-bg-dark navbar-right">
                <li>
                    <a class="text-center" href="{{url('/home')}}">
                       <i class="fa fa-globe fa-fw"></i> Back to website
                    </a>
                </li>
                <li>
                    <form action="">
                        <button width="50" class=" btn btn-default">
                            <i class="fa fa-fw fa-refresh"></i> Refresh page
                        </button>
                    </form>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        @if($msgs = App\Message::all())
                            @foreach($msgs as $msg)
                            <li>
                                <a>
                                    <div>
                                        @if($owner = App\User::findOrFail($msg->user_id)->first())
                                        <strong>{{$owner->surname}} {{$owner->firstname}}</strong>
                                        <br>
                                        <small>{{$owner->matric}}</small>
                                        @endif
                                        <span class="pull-right text-muted">
                                            <em>{{$msg->created_at->diffForHumans()}}</em>
                                        </span>
                                    </div>
                                    <div>{{$msg->content}}</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                        @endforeach
                    @endif
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{url('/profile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        <li><a href="{{url('/editadminprofiles')}}"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->











            <div class="navbar-default navbar-bg-dark sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <li>
                        <button onclick="javascript:history.back()" class="center pull-center btn btn-default"><i class="fa fa-arrow-left fa-fw"></i> Back</button>
                    </li>
                    <ul class="nav navbar-link" id="side-menu">
                        <li class="sidebar-search">
                            <form action="{{url('/adminsearch')}}" method="post">
                                <div class="input-group custom-search-form">
                                    {{csrf_field()}}
                                    <input type="text" class="form-control" name="keyword" required placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                            </form>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('/adminpage')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-cogs fa-fw"></i> Programmes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Full-Time <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{url('/fulltimeprogcreate')}}">Create</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/fulltimeprogedit')}}">Edit</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/fulltimeprogview')}}">View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/fulltimeprogdelete')}}">Delete</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Part-Time <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{url('/parttimeprogcreate')}}">Create</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/parttimeprogedit')}}">Edit</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/parttimeprogview')}}">View</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/parttimeprogdelete')}}">Delete</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Profiles<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/viewprofiles')}}">View Profiles</a>
                                </li>
                                <li>
                                    <a href="{{url('/editprofiles')}}">Edit Profiles</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>