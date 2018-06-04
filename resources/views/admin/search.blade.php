@extends('admin.layouts.app')
@section('contents')
@include('layouts.addits')
<div class="container-fluid row" style="padding-top: 3em;">
        <div class="row">
            <div class="col-lg-5">
                <h1><i class="fa fa-search"></i> Search</h1>
                <small>Search result for the search key <strong>"{{$searchkey}}"</strong></small>
            </div>
            <div class="col-lg-7">
                <form action="{{url('/adminsearch')}}" method="post" style="margin-top: 1.5em;">
                    <div class="input-group custom-search-form">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="keyword" required placeholder="Try another search key">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="col-lg-4">
            <div class="header">
                <h3>Full-time Courses <i class="fa fa-angle-down fa-fw"></i></h3>
            </div>
            @if($ftcourse_result->count() > 0)
            <div class="panel panel-success">
                <div class="panel-heading bg-success">
                    <div class="row bg-success">
                        <div class="col-lg-12">
                            <h5>{{$ftcourse_result->count()}} results found</h5>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Course code</th>
                                <th>Course title</th>
                                <th>Course unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ftcourse_result as $ftcourse)
                                <tr class="odd gradeX">
                                    <td class="center">{{$ftcourse->course_code}}</td>
                                    <td class="center">{{$ftcourse->course_title}}</td>
                                    <td class="center">{{$ftcourse->course_unit}}</td
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="row bg-danger">
                <div class="col-lg-12">
                    <h5>Opps {{$ftcourse_result->count()}} results found</h5>
                </div>
            </div>
            @endif
        </div>


































        <div class="col-lg-4">
            <div class="header">
                <h3>Part-time Courses <i class="fa fa-angle-down fa-fw"></i></h3>
            </div>
            @if($ptcourse_result->count() > 0)
            <div class="panel panel-success">
                <div class="panel-heading bg-success">
                    <div class="row bg-success">
                        <div class="col-lg-12">
                            <h5>{{$ptcourse_result->count()}} results found</h5>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Course code</th>
                                <th>Course title</th>
                                <th>Course unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ptcourse_result as $ptcourse)
                                <tr class="odd gradeX">
                                    <td class="center">{{$ptcourse->course_code}}</td>
                                    <td class="center">{{$ptcourse->course_title}}</td>
                                    <td class="center">{{$ptcourse->course_unit}}</td
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="row bg-danger">
                <div class="col-lg-12">
                    <h5>Opps {{$ptcourse_result->count()}} results found</h5>
                </div>
            </div>
            @endif
        </div>


































<div class="col-lg-2">
    <div class="header">
        <h5>Full-time Departments <i class="fa fa-angle-down fa-fw"></i></h5>
    </div>
    @if($ftdepartment_result->count() > 0)
    <div class="panel panel-success">
        <div class="panel-heading bg-success">
            <div class="row bg-success">
                <div class="col-lg-12">
                    <h5>{{$ftdepartment_result->count()}} results found</h5>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ftdepartment_result as $ftdepartment)
                        <tr class="odd gradeX">
                            <td class="center">{{$ftdepartment->title}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <div class="row bg-danger">
        <div class="col-lg-12">
            <h5>Opps {{$ftdepartment_result->count()}} results found</h5>
        </div>
    </div>
    @endif
</div>


































<div class="col-lg-2">
    <div class="header">
        <h5>Part-time Departments <i class="fa fa-angle-down fa-fw"></i></h5>
    </div>
    @if($ptdepartment_result->count() > 0)
    <div class="panel panel-success">
        <div class="panel-heading bg-success">
            <div class="row bg-success">
                <div class="col-lg-12">
                    <h5>{{$ptdepartment_result->count()}} results found</h5>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ptdepartment_result as $ptdepartment)
                        <tr class="odd gradeX">
                            <td class="center">{{$ptdepartment->title}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="row bg-danger">
        <div class="col-lg-12">
            <h5>Opps {{$ptdepartment_result->count()}} results found</h5>
        </div>
    </div>
    @endif
</div>
</div>























<div class="row">
    <div class="col-lg-3">
        <div class="header">
            <h4>Full-time Programme-types <i class="fa fa-angle-down fa-fw"></i></h4>
        </div>
        @if($ftptype_result->count() > 0)
        <div class="panel panel-success">
            <div class="panel-heading bg-success">
                <div class="row bg-success">
                    <div class="col-lg-12">
                        <h5>{{$ftptype_result->count()}} results found</h5>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ftptype_result as $ftptype)
                            <tr class="odd gradeX">
                                <td class="center">{{$ftptype->title}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="row bg-danger">
            <div class="col-lg-12">
                <h5>Opps {{$ftptype_result->count()}} results found</h5>
            </div>
        </div>
        @endif
    </div>





















    <div class="col-lg-3">
        <div class="header">
            <h4>Part-time Programme-types <i class="fa fa-angle-down fa-fw"></i></h4>
        </div>
        @if($ptptype_result->count() > 0)
        <div class="panel panel-success">
            <div class="panel-heading bg-success">
                <div class="row bg-success">
                    <div class="col-lg-12">
                        <h5>{{$ptptype_result->count()}} results found</h5>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ptptype_result as $ptptype)
                            <tr class="odd gradeX">
                                <td class="center">{{$ptptype->title}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="row bg-danger">
            <div class="col-lg-12">
                <h5>Opps {{$ftptype_result->count()}} results found</h5>
            </div>
        </div>
        @endif
    </div>





















<div class="col-lg-6">
    <div class="header">
        <h4>Users <i class="fa fa-angle-down fa-fw"></i></h4>
    </div>
    @if($usersurname_result->count() > 0)
    <div class="panel panel-success">
        <div class="panel-heading bg-success">
            <div class="row bg-success">
                <div class="col-lg-12">
                    <h5>{{$usersurname_result->count()}} results found</h5>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Surname</th>
                        <th>Matric</th>
                        <th>Email</th>
                        <th>Picture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usersurname_result as $user)
                        <tr class="odd gradeX">
                            <td class="center">{{$user->surname}}</td>
                            <td class="center">{{$user->matric}}</td>
                            <td class="center">{{$user->email}}</td>
                            <td class="center"><img src="uploads/{{$user->path}}" width="50" height="50" alt=".."></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @elseif($usermatric_result->count() > 0)
    <div class="panel panel-success">
        <div class="panel-heading bg-success">
            <div class="row bg-success">
                <div class="col-lg-12">
                    <h5>{{$usermatric_result->count()}} results found</h5>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Surname</th>
                        <th>Matric</th>
                        <th>Email</th>
                        <th>Picture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usermatric_result as $user)
                        <tr class="odd gradeX">
                            <td class="center">{{$user->surname}}</td>
                            <td class="center">{{$user->matric}}</td>
                            <td class="center">{{$user->email}}</td>
                            <td class="center"><img src="uploads/{{$user->path}}" width="50" height="50" alt=".."></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="row bg-danger">
        <div class="col-lg-12">
            <h5>Opps {{$usermatric_result->count()}} results found</h5>
        </div>
    </div>
    @endif
    </div>
</div>
@endsection