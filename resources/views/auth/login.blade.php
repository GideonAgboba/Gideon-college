@extends('layouts.app')
@include('layouts.welcome-navbar')
@section('contents')
@include('layouts.addits')
<script>
$(document).ready(function(){
    $('#prog-type').fadeIn('slow');
    $('#loginForm').fadeOut('slow');
    $("#proceed").click(function(e){
        $('#prog-type').fadeOut('slow');
	});
});
</script>
@if(!empty(session()->get('successmsg')))
<div id="prog-type">
    <div class="prog-type-content text-center">
        <h3 class="text-center">Hi. {{session()->get('successmsg')}} </h3>
        <h1 class="text-muted">{{session()->get('matricmsg')}}</h1>
        <p>Login with your matric and surname as your password</p>
        <br>
        <button id="proceed" class="mbr-buttons__btn btn btn-lg btn-default animated fadeInUp delay">
            PROCCED TO LOGIN
        </button>
    </div>
</div>

<?php
    session()->forget('successmsg');
?>
@endif
<section class="mbr-figure mbr-figure--wysiwyg mbr-figure--full-width mbr-figure--caption-inside-bottom" id="image1-e" data-rv-view="113">
    <div>
    <img src="assets/images/slide3.jpg" class="mbr-figure__img">
    <div class="mbr-section__container mbr-section__container--std-padding container register-form">
        <div class="row container">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" data-form-type="formoid">
                        <div class="mbr-header mbr-header--center mbr-header--std-padding">
                            <h1 class="mbr-header__text text-white">LOGIN FORM</h1>
                        </div>
                        <div data-form-alert="true">
                            <div class="hide" data-form-alert-success="true">Thanks for filling out form!</div>
                        </div>
                            <form class="form-horizontal"  action="{{url('/profilelogin')}}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('matric') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="matric" placeholder="Enter matric here..." type="text" class="form-control" name="matric" value="{{ old('matric') }}" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <div class="checkbox">
                                        <label class="text-white">
                                            <input type="checkbox" class="p-5" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="form-control mbr-buttons__btn btn btn-lg btn-danger">
                                        LOGIN
                                    </button>

                                    <a class="pull-left text-white" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                    <a class="pull-right text-white" href="{{ url('/register') }}">Dont have an account? Click to create one</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <figcaption class="mbr-figure__caption mbr-figure__caption--std-grid">
        <small class="mbr-figure__caption-small">
            <marquee behavior="scroll" direction="left">Thank you for joining us</marquee>
            </small>
    </figcaption>
</section>
@endsection
