@extends('admin.layouts.app')
@section('contents')
@include('layouts.addits')
<script>
$(document).ready(function(){	
	$(".programmetypeedit").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/fulltimeprogtypesubmitedit",
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
<script>
$(document).ready(function(){	
	$(".departmentsedit").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/fulltimedepartmentsubmitedit",
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

<script>
$(document).ready(function(){	
	$(".courseedit").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/fulltimecoursesubmitedit",
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
<div class="row">
    <div class="header text-center">
        <h1>
            FULL-TIME
            <br>
            <small><small>Programme edit</small></small>
        </h1>
        <hr>
    </div>
    <!-- <div class="loader"></div> -->
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bars fa-fw"></i> Programme Type
            </div>
            <div class="panel-body">
                @if($progtypes = App\FullTimeProgrammeType::all())
                    @foreach($progtypes as $progtype)
                        <form class="programmetypeedit">
                            <div class="row container-fluid">
                                <input type="hidden" name="id" value="{{$progtype->id}}">
                                <input type="text" name="title" class="form-input" value="{{$progtype->title}}" required />
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button id="loading"  class="btn btn-warning" disabled>
                                    <i class="loader fa fa-edit"></i>
                                </button>
                                <button id="done" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                        </form>
                    @endforeach
                @endif
            </div>
            <!-- /.panel-body -->
        </div>
    </div>









    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bars fa-fw"></i> Departments
            </div>
            <div class="panel-body">
                @if($departments = App\FullTimeDepartment::all())
                    @foreach($departments as $department)
                        <form class="departmentsedit">
                            <div class="row container-fluid">
                                <input type="hidden" name="id" value="{{$department->id}}">
                                <input type="text" name="title" class="form-input" value="{{$department->title}}" required />
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button id="loading"  class="btn btn-warning" disabled>
                                    <i class="loader fa fa-edit"></i>
                                </button>
                                <button id="done" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                        </form>
                    @endforeach
                @endif
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>













<div class="row">
    <div class="header text-center">
        <h1>
            <small><small>Course edit</small></small>
        </h1>
        <hr>
    </div>
    @if($departments = App\FullTimeDepartment::all())
        @foreach($departments as $department)
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bars fa-fw"></i> {{$department->title}} department
                    </div>
                    <div class="panel-body">
                        @if($courses = App\FullTimeCourse::where('full_time_department_id', $department->id)->get())
                            @foreach($courses as $course)
                                <form class="courseedit">
                                    <div class="row container-fluid">
                                        <input type="hidden" name="id" value="{{$course->id}}">
                                        <input type="hidden" name="full_time_department_id" value="{{$department->id}}">
                                        <div class="container-fluid">
                                            <div class="ml-5 mr-5 row">
                                                <input type="text" name="course_code" class="col-md-7 form-input" value="{{$course->course_code}}" required />
                                                <input type="number" name="course_unit" class="col-lg-5 form-input" value="{{$course->course_unit}}" required />
                                            </div>
                                        </div>
                                        <input type="text" name="course_title" class="form-input" value="{{$course->course_title}}" required />
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button id="loading"  class="btn btn-warning" disabled>
                                            <i class="loader fa fa-edit"></i>
                                        </button>
                                        <button id="done" class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection