<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark home-bg-dark fixed-top" id="mainNav">
    <div class="navbar-brand">
        <a href="#" class="navbar-logo pull-left"><img src="logo.png" alt="Gideon"></a>
        <a class="text-white nav-link" href="{{url('/')}}">Colibs College</a>
    </div>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav home-bg-dark" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Profile">
          <a class="nav-link" href="{{url('/profile')}}">
            <i class="fa fa-fw fa-user"></i>
            <!-- #252525 -->
            <span class="nav-link-text">My Profile</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Student Info">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#profileoptions" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-info-circle"></i>
            <span class="nav-link-text">Student Info</span>
          </a>
          <ul class="sidenav-second-level collapse" id="profileoptions">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Course Registration">
              <a class="nav-link" href="{{url('courseregistration')}}">
                <i class="fa fa-fw fa-download"></i>
                <span class="nav-link-text">Course Registration</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Get Docket">
              <a class="nav-link" href="tables.html">
                <i class="fa fa-fw fa-file"></i>
                <span class="nav-link-text">Get Docket</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile Update">
              <a class="nav-link" href="charts.html">
                <i class="fa fa-fw fa-edit"></i>
                <span class="nav-link-text">Profile Update</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Result">
              <a class="nav-link" href="charts.html">
                <i class="fa fa-fw fa-calculator"></i>
                <span class="nav-link-text">My result</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Payments">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#payments" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">Payments</span>
          </a>
          <ul class="sidenav-second-level collapse" id="payments">
            <li>
              <a href="navbar.html">Fee Payments/Reciept</a>
            </li>
            <li>
              <a href="cards.html">Other payments</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Students | School">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#studentandschool" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-building"></i>
            <span class="nav-link-text">Student | School</span>
          </a>
          <ul class="sidenav-second-level collapse" id="studentandschool">
            <li>
              <a href="navbar.html">Accomodation</a>
            </li>
            <li>
              <a href="cards.html">Student Union</a>
            </li>
            <li>
              <a href="cards.html">School Events</a>
            </li>
            <li>
              <a href="cards.html">Transcript</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>








      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
          <a class="nav-link" href="{{url('/profile')}}">{{Auth::user()->matric}}</a>
        </li> -->
        @if(Auth::user()->role_id == 1)
        <li class="nav-item">
          <a class="nav-link" href="{{url('/adminpage')}}">Visit admin page</a>
        </li>
        @endif
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-question"></i> Help
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <form class="sendmsg">
              <h6 class="dropdown-header">New Message:</h6>
              <div class="dropdown-divider"></div>
              {{csrf_field()}}
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <textarea name="content" placeholder="Write your report / complains..." cols="30" rows="10" required></textarea>
              <div class="dropdown-divider"></div>
              <button type="submit" class="btn form-control home-bg-dark text-white"><i class="fa fa-envelope"></i> SEND</button>
              <button id="loading"  class="btn form-control text-white btn-warning">
                  <i class="loader fa fa-plus"></i>  SENDING...
              </button>
              <button id="done" class="btn form-control btn-success">
                  <i class="fa fa-check"></i> SENT
              </button>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/logout')}}">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="javascript:history.back()">
            <i class="fa fa-fw fa-arrow-left"></i>Back</a>
        </li>
      </ul>
    </div>
  </nav>













































@include('layouts.addits')
<script>
$(document).ready(function(){
    $('#prog-type').fadeIn('slow');
    $("#proceed").click(function(e){
        $('#prog-type').fadeOut('slow');
	});
});
</script>
@if(!empty(session()->get('paymenterror')))
<div id="prog-type">
    <div class="prog-type-content text-center">
        <i id="proceed" class="pull-right fa-2x fa fa-close"></i>
        <br>
        <h3 class="text-center">Hi. {{Auth::user()->surname}}  {{Auth::user()->firstname}}</h3>
        <h4>
          {{session()->get('paymenterror')}}
        </h4>
    </div>
</div>

<?php
    session()->forget('paymenterror');
?>
@endif
<script>
$(document).ready(function(){	
	$(".sendmsg").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/usersendmessage",
				type: "POST",
				data: form_data
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
            })
                    e.preventDefault();
		});

});
</script>