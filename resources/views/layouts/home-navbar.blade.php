<section id="dropdown-menu-0" data-rv-view="0">

    <nav class="navbar navbar-dropdown transparent navbar-fixed-top bg-color">

        <div class="container-fluid">

            <div class="navbar-brand">
                <a href="{{url('/')}}" class="navbar-logo nav-link pull-left"><img src="logo.png" alt="logo"></a>
                <a class="text-white nav-link" href="{{url('/')}}">Gideon College</a>
            </div>

            <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                <div class="hamburger-icon"></div>
            </button>

            <ul class="nav-dropdown collapse pull-xs-right navbar-toggleable-sm nav navbar-nav" id="exCollapsingNavbar">
                @if(Auth::user()->role_id == 2)
                <li class="nav-item">
                    <a class="nav-link link" href="{{url('/')}}">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="false">SERVICES / UNITS</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Payments</a>
                        <a class="dropdown-item" href="#">Admission list</a>
                        <div class="dropdown">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="false">Returning students</a>
                            <div class="dropdown-menu dropdown-submenu">
                                <a class="dropdown-item" href="#">STATEMENT OF RESULT CONFIRMATION</a>
                                <a class="dropdown-item" href="#">STUDENT PORTAL</a>
                                <a class="dropdown-item" href="#">TRANSCRIPT</a>
                                <a class="dropdown-item" href="#">PAYMENT CONFIRMATION AND VALIDATION</a>
                                <a class="dropdown-item" href="#">PRINT EVIDENCE OF PAYMENTS</a>
                                <a class="dropdown-item" href="#">PRINT SCHOOL FEES RESULT</a>
                                <a class="dropdown-item" href="#">ASSISTANCE / ONLINE HELP</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="false">Prospective students</a>
                            <div class="dropdown-menu dropdown-submenu">
                                <a class="dropdown-item" href="#">SCHOOL FEES PAYMENTS (NEW APPLICANTS)</a>
                                <a class="dropdown-item" href="#">TRANSCRIPT PAY</a>
                                <a class="dropdown-item" href="#">ONLINE APPLICATION</a>
                                <a class="dropdown-item" href="#">ACCEPTANCE FEE</a>
                                <a class="dropdown-item" href="#">CHANGE OF COURSE</a>
                                <a class="dropdown-item" href="#">PAYMENT CONVIRMATION/VALIDATION</a>
                                <a class="dropdown-item" href="#">PRINT EVIDENCE OF PAYMENTS</a>
                                <a class="dropdown-item" href="#">DIRECT ENTRY APPLICATION</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="false">Units</a>
                            <div class="dropdown-menu dropdown-submenu">
                                <a class="dropdown-item" href="#">CTIM</a>
                                <a class="dropdown-item" href="#">TRANSCRIPT PAY</a>
                                <a class="dropdown-item" href="#">ONLINE APPLICATION</a>
                                <a class="dropdown-item" href="#">ACCEPTANCE FEE</a>
                                <a class="dropdown-item" href="#">CHANGE OF COURSE</a>
                                <a class="dropdown-item" href="#">PAYMENT CONVIRMATION/VALIDATION</a>
                                <a class="dropdown-item" href="#">PRINT EVIDENCE OF PAYMENTS</a>
                                <a class="dropdown-item" href="#">DIRECT ENTRY APPLICATION</a>
                            </div>
                        </div>
                        <a class="dropdown-item" href="#">Registration procedures</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="false">SCHOOL/ACAD. UNITS</a>
                    <div class="dropdown-menu">
                        <div class="dropdown">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="false">Full time departments</a>
                            <div class="dropdown-menu dropdown-submenu">
                                @if($ftdepartments = App\FullTimeDepartment::all())
                                    @foreach($ftdepartments as $ftdepartment)
                                        <a class="dropdown-item" href="<?php echo URL::to('/');?>/<?= $ftdepartment->title ?>">{{$ftdepartment->title}}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="false">Part time departments</a>
                            <div class="dropdown-menu dropdown-submenu">
                                @if($ptdepartments = App\PartTimeDepartment::all())
                                    @foreach($ptdepartments as $ptdepartment)
                                        <a class="dropdown-item" href="<?php echo URL::to('/');?>/<?= $ptdepartment->title ?>">{{$ptdepartment->title}}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown open">
                <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="true">FAQs</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Forum</a>
                    <a class="dropdown-item" href="#">Tutorials</a>
                    <a class="dropdown-item" href="#">Contact us</a>
                </div>
                </li>
                <li class="nav-item dropdown open">
                <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="true">
                    <img src="uploads/{{Auth::user()->path}}" style="width:30px;height:30px;border-radius: 30px;" alt="...">
                    {{strtoupper(Auth::user()->surname)}}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/profile')}}">Profile</a>
                    <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                </div>
                </li>
                @else

                <li class="nav-item dropdown open">
                <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="#" aria-expanded="true">
                    <img src="uploads/{{Auth::user()->path}}" style="width:30px;height:30px;border-radius: 30px;" alt="...">
                    {{strtoupper(Auth::user()->surname)}}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/profile')}}">Profile</a>
                    <a class="dropdown-item" href="{{url('/adminpage')}}">Visit adminpage</a>
                    <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                </div>
                </li>
                @endif
            </ul>

        </div>

    <!-- </nav> -->

</section>