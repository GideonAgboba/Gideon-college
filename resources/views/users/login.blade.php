@extends('layouts.app')
@include('layouts.welcome-navbar')
@section('contents')
@include('layouts.addits')
<script>
$(document).ready(function(){
    $('#prog-type').fadeIn('slow');
});
</script>
<style>
.profile_img img{
    width: 200px;
    height: 200px;
    border-radius: 200px;
    border: 1px solid #000;
    /* box-shadow: 0px 3px 10px #000; */
    position: absolute;
    top: 00%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: #fff;
}
</style>
<div id="prog-type">
    <div class="prog-type-content">
        <div class="profile_img">
            <img src="uploads/{{session()->get('path')}}" alt="profile">
        </div>
        <br>
        <br>
        <br>
        <br>
        <p class="text-center">Welcome {{strtoupper(session()->get('surname'))}} {{strtoupper(session()->get('firstname'))}}</p>
        <div class="row text-center">
            <form action="{{url('/login')}}" method="POST">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-lg-12">
                            <input id="password" type="password" placeholder="Enter your password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <input type="hidden" name="email" value="{{session()->get('email')}}">
                    {{csrf_field()}}
                    <input value="PROCEED" type="submit" class="mbr-buttons__btn btn btn-lg btn-default form-control animated fadeInUp delay">
                </div>
            </form>
        </div>
    </div>
</div>
<section class="mbr-figure mbr-figure--wysiwyg mbr-figure--full-width mbr-figure--caption-inside-bottom" id="image1-e" data-rv-view="113">
    <div>
    <img src="assets/images/slide3.jpg" class="mbr-figure__img">
    <div class="mbr-section__container mbr-section__container--std-padding container register-form">
        
    </div>
    </div>
    <figcaption class="mbr-figure__caption mbr-figure__caption--std-grid">
        <small class="mbr-figure__caption-small">
            <marquee behavior="scroll" direction="left">Please note that informations provided cannot be changed without paying a fee. Please fill out these fields cearfully. Thanks Management</marquee>
            </small>
    </figcaption>
</section>
@endsection
