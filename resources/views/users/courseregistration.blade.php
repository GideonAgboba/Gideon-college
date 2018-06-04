@extends('users.layouts.app')
@section('contents')
<style>
</style>
    <div class="card mb-5">
        <div class="card-header">
            <i class="fa fa-fw fa-table"></i> Course Registration
        </div>
        <div class="information">
            <marquee behavior="scroll" direction="left">
                Please carefully select courses you wish to take all adding up to not more than 20units in total
            </marquee>
            <!-- <button>Print Bio-Date</button> -->
        </div>
        <div class="card-body" id="printableArea">
            <div class="row">
                <div class="col-lg-9">
                    <div class="bio-data-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item">
                                    <strong>Date Viewed:</strong>
                                    <small><?php $date = date('Y-d-m'); $time = date('h:m:s'); echo $date .' ' .$time;  ?></small>
                                </div>
                                <div class="item">
                                    <strong>Date Registered:</strong>
                                    <small>{{Auth::user()->created_at}}</small>
                                </div>
                                <div class="item">
                                    <strong><a>{{Auth::user()->session}} ACADEMIC SESSION</a></strong>
                                </div>
                                <div class="item">
                                    <strong>SIEMESTER | COURSE REGISTRATION</strong>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item">
                                    <a>{{Auth::user()->surname}} {{Auth::user()->firstname}} {{Auth::user()->othername}}</a>
                                </div>
                                <div class="item">
                                    <a>{{Auth::user()->matric}}</a>
                                </div>
                                <div class="item">
                                    <a>{{Auth::user()->department}}</a>
                                </div>
                                <div class="item">
                                    <a>{{Auth::user()->programme_type}} ({{Auth::user()->programme_mode}})</a>
                                </div>
                                <div class="item">
                                    <a>Siemester {{Auth::user()->siemester}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="profile-img">
                        <img src="uploads/{{Auth::user()->path}}" alt="profile">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <form action="#">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Course code</th>
                                <th>Course title</th>
                                <th>Course status</th>
                                <th>Course unit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(Auth::user()->programme_mode == 'full-time')
                            @if($departments = App\FullTimeDepartment::where('title', Auth::user()->department)->get())
                                @foreach($departments as $department)
                                    @if($courses = App\FullTimeCourse::where('full_time_department_id', $department->id)->get())
                                        @foreach($courses as $course)
                                        <tr class="odd gradeX">
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>{{$course->course_code}}</td>
                                            <td>{{$course->course_title}}</td>
                                            <td>Null</td>
                                            <td>{{$course->course_unit}}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @elseif(Auth::user()->programme_mode == 'part-time')
                            @if($departments = App\PartTimeDepartment::where('title', Auth::user()->department)->get())
                                @foreach($departments as $department)
                                    @if($courses = App\PartTimeCourse::where('part_time_department_id', $department->id)->get())
                                        @foreach($courses as $course)
                                        <tr class="odd gradeX">
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>{{$course->course_code}}</td>
                                            <td>{{$course->course_title}}</td>
                                            <td>Null</td>
                                            <td>{{$course->course_unit}}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endif
                        </tbody>
                    </table>
                    <button class="print btn btn-sm text-white bg-dark" type="submit">
                        PROCEED COURSE REGISTRATION
                    </button>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <a class="text-muted">
                    <small>
                        <small>Copyright [c] 2018 DEVELOPED BY GIDEON | GIDEON COLEGE</small>
                    </small>
                </a>
            </div>
        </div>
    </div>
@endsection