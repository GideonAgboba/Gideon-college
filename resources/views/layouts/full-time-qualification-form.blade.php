@extends('layouts.app')
@include('layouts.welcome-navbar')
@section('contents')
@include('layouts.addits')
<script>
$(document).ready(function(){
    $('#prog-type').fadeIn('slow');
});
</script>
<div id="prog-type">
    <div class="prog-type-content">
        <h4 class="text-center"> Welcome. please add jamb results to proceed </h4>
        <br>
        <br>
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="phone" required="" placeholder="Enter phone number*">
                    </div>
                    <div class="col-lg-2">
                        <input type="email" class="form-control" name="email" required="" placeholder="Enter email address*">
                    </div>
                </div>
            </div>
            <button type="submit" class="form-control mbr-buttons__btn btn btn-lg btn-danger">SUBMIT FORM</button>
        </form>
    </div>
</div>
@endsection