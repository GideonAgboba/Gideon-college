@extends('layouts.app')
@include('layouts.welcome-navbar')
@section('contents')
@include('layouts.addits')
<script>
$(document).ready(function(){
    $('#prog-type').fadeIn('slow');
    $("#full-time").click(function(e){
        $('#prog-type').fadeOut('slow');
        $('#fullTimeForm').fadeIn('slow');
	});
    $("#part-time").click(function(e){
        $('#prog-type').fadeOut('slow');
        $('#partTimeForm').fadeIn('slow');
	});
});
</script>
<style>
input{
    text-align: center;
}
</style>
<div id="prog-type">
    <div class="prog-type-content">
        <h1 class="text-center"> Hi. Please select your programme mode to proceed </h1>
        <br>
        <br>
        <div class="row text-center">
            <div class="col-lg-6">
                <button id="full-time" class="mbr-buttons__btn btn btn-lg btn-default animated fadeInUp delay">
                    FULL-TIME
                </button>
            </div>
            <div class="col-lg-6">
                <button id="part-time" class="mbr-buttons__btn btn btn-lg btn-default animated fadeInUp delay">
                    PART-TIME
                </button>
            </div>
        </div>
    </div>
</div>
<section class="mbr-figure mbr-figure--wysiwyg mbr-figure--full-width mbr-figure--caption-inside-bottom" id="image1-e" data-rv-view="113">
    <div>
    <img src="assets/images/slide3.jpg" class="mbr-figure__img">
    <div class="mbr-section__container mbr-section__container--std-padding container register-form">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" data-form-type="formoid">
                        <div class="mbr-header mbr-header--center mbr-header--std-padding">
                            <h1 class="mbr-header__text text-white">REGISTER FORM</h1>
                        </div>
                        <div data-form-alert="true">
                            <div class="hide" data-form-alert-success="true">Thanks for filling out form!</div>
                        </div>
                        @include('layouts.full-time-form')
                        @include('layouts.part-time-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <figcaption class="mbr-figure__caption mbr-figure__caption--std-grid">
        <small class="mbr-figure__caption-small">
            <marquee behavior="scroll" direction="left">Please note that informations provided cannot be changed without paying a fee. Please fill out these fields cearfully. Thanks Management</marquee>
            </small>
    </figcaption>
</section>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" /">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
