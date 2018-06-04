@extends('admin.layouts.app')
@section('contents')
@include('layouts.addits')
<div class="row">
    <div class="header text-center">
        <h1>
            PART-TIME
            <br>
            <small><small>Programme show</small></small>
        </h1>
        <hr>
    </div>
    <!-- <div class="loader"></div> -->
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bars fa-fw"></i> Programme Type
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($progtypes = App\PartTimeProgrammeType::all())
                        @foreach($progtypes as $progtype)
                            <tr class="odd gradeX">
                                <td class="center">{{$progtype->id}}</td>
                                <td class="center">{{$progtype->title}}</td>
                                <td class="center">{{$progtype->created_at->diffForHumans()}}</td>
                                <td class="center">{{$progtype->updated_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
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
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($departments = App\PartTimeDepartment::all())
                        @foreach($departments as $department)
                            <tr class="odd gradeX">
                                <td class="center">{{$department->id}}</td>
                                <td class="center">{{$department->title}}</td>
                                <td class="center">{{$department->created_at->diffForHumans()}}</td>
                                <td class="center">{{$department->updated_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>













<div class="row">
    <div class="header text-center">
        <h1>
            <small><small>Course show</small></small>
        </h1>
        <hr>
    </div>
    @if($departments = App\PartTimeDepartment::all())
        @foreach($departments as $department)
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bars fa-fw"></i> {{$department->title}} department
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Course code</th>
                                    <th>Course title</th>
                                    <th>Course unit</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($courses =App\PartTimeCourse::where('Part_time_department_id', $department->id)->get())
                                @foreach($courses as $course)
                                    <tr class="odd gradeX">
                                        <td class="center">{{$course->id}}</td>
                                        <td class="center">{{$course->course_code}}</td>
                                        <td class="center">{{$course->course_title}}</td>
                                        <td class="center">{{$course->course_unit}}</td>
                                        <!-- <td class="center">{{$course->course_title}}</td> -->
                                        <td class="center">{{$course->created_at->diffForHumans()}}</td>
                                        <td class="center">{{$course->updated_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection