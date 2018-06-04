@extends('admin.layouts.app')
@section('contents')
@include('layouts.addits')
<div class="row">
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-user fa-fw"></i> Create a user
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-center">FULL-TIME</h3>
                    @include('admin.layouts.full-time-form')
                </div>
                <div class="col-lg-6">
                    <h3 class="text-center">PART-TIME</h3>
                    @include('admin.layouts.part-time-form')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-fw fa-table"></i> Profiles Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body" style="overflow-x: auto;">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Surname</th>
                            <th>Firstname</th>
                            <th>Othername</th>
                            <th>Matric</th>
                            <th>Programme-type</th>
                            <th>Session</th>
                            <th>School</th>
                            <th>Department</th>
                            <th>Programme-mode</th>
                            <th>Level</th>
                            <th>Entry-year</th>
                            <th>Sex</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Semester</th>
                            <th>Date-of-birth</th>
                            <th>State-of-origin</th>
                            <th>Local-government</th>
                            <th>Parent-name</th>
                            <th>Parent-address</th>
                            <th>Parent-phone</th>
                            <th>Payment-status</th>
                            <th>Picture</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users = App\User::all())
                            @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>{{$user->surname}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->othername}}</td>
                                <td>{{$user->matric}}</td>
                                <td>{{$user->programme_type}}</td>
                                <td>{{$user->session}}</td>
                                <td>{{$user->school}}</td>
                                <td>{{$user->department}}</td>
                                <td>{{$user->programme_mode}}</td>
                                <td>{{$user->level}}</td>
                                <td>{{$user->entry_year}}</td>
                                <td>{{$user->sex}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->semester}}</td>
                                <td>{{$user->date_of_birtd}}</td>
                                <td>{{$user->state_of_origin}}</td>
                                <td>{{$user->local_government}}</td>
                                <td>{{$user->parent_name}}</td>
                                <td>{{$user->parent_address}}</td>
                                <td>{{$user->parent_phone}}</td>
                                <td>{{$user->payment_status}}</td>
                                <td><img src="uploads/{{$user->path}}" width="50" height="50" alt="photo" class="rounded-circle"></td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
});
</script>
@endsection