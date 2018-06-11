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
input{
    text-transform: uppercase;
}
</style>
<div id="prog-type">
    <div class="prog-type-content">
        <h4 class="text-center"> Welcome {{$surname}} {{$firstname}} please add your jamb result information to proceed </h4>
        <br>
        <br>
        <form action="{{url('/fullregistration')}}" method="post">
            <input type="hidden" name="id" value="{{$id}}">
            {{csrf_field()}}
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name="examination_number" required="" placeholder="Enter examination number*">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="subject1" required="" placeholder="Enter subject* ie mathematics">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="grade1" required="" placeholder="Grade*">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="subject2" required="" placeholder="Enter subject* ie english">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="grade2" required="" placeholder="Grade*">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="subject3" required="" placeholder="Enter subject*">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="grade3" required="" placeholder="Grade*">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="subject4" required="" placeholder="Enter subject*">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="grade4" required="" placeholder="Grade*">
                    </div>
                </div>
            </div>
            <button type="submit" class="form-control mbr-buttons__btn btn btn-lg btn-danger">SUBMIT FORM</button>
        </form>
    </div>
</div>
@endsection