@extends('admin.layouts.app')
@section('contents')
@include('layouts.addits')
<style>
.rounded-circle img{
    width: 250px;
    height: 250px;
    border-radius: 250px;
    margin-left: 7%;
}
</style>
<br>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-fw fa-sign-in"></i> Logged in as: {{Auth::user()->othername}}
            </div>
            <div class="panel-body">
                <div class="rounded-circle" style="margin-bottom: 20px;">
                    <img src="uploads/{{Auth::user()->path}}" alt="">
                </div>
                <form class="changepassword">
                    <div class="row container-fluid">
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        <input type="text" name="password" class="form-input" placeholder="Change password..." required />
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-shield"></i>
                        </button>
                        <button id="loading"  class="btn btn-warning" disabled>
                            <i class="loader fa fa-plus"></i>
                        </button>
                        <button id="done" class="btn btn-success">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-fw fa-table"></i> Admin Profiles
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body" style="overflow-x: auto;">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Delete</th>
                            <th>Edit</th>
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
                            <th>Siemester</th>
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
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users = App\User::where('role_id', 1)->get())
                            @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>{{$user->id}}</td>
                                <td>
                                    <form class="delete">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        @if($user->id !== Auth::user()->id)
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-fw fa-trash"></i>
                                        </button>
                                        @else
                                        <button type="submit" disabled class="btn btn-danger">
                                            <i class="fa fa-fw fa-trash"></i>
                                        </button>
                                        @endif
                                        <button id="loading"  class="btn btn-warning" disabled>
                                            <i class="loader fa fa-plus"></i>
                                        </button>
                                        <button id="done" class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>
                                </td>

                                    <td>
                                    <form class="edit">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <button type="submit" role="button" class="btn btn-primary">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </button>
                                        <button id="loading"  class="btn btn-warning" disabled>
                                            <i class="loader fa fa-plus"></i>
                                        </button>
                                        <button id="done" class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </td>
                                    <td><input type="text" class="form-control" name="surname" value="{{$user->surname}}"></td>
                                    <td><input type="text" class="form-control" name="firstname" value="{{$user->firstname}}"></td>
                                    <td><input type="text" class="form-control" name="othername" value="{{$user->othername}}"></td>
                                    <td><input type="text" class="form-control" name="matric" value="{{$user->matric}}"></td>
                                    <td><input type="text" class="form-control" name="programme_type" value="{{$user->programme_type}}"></td>
                                    <td><input type="text" class="form-control" name="session" value="{{$user->session}}"></td>
                                    <td><input type="text" class="form-control" name="school" value="{{$user->school}}"></td>
                                    <td><input type="text" class="form-control" name="department" value="{{$user->department}}"></td>
                                    <td><input type="text" class="form-control" name="programme_mode" value="{{$user->programme_mode}}"></td>
                                    <td><input type="text" class="form-control" name="level" value="{{$user->level}}"></td>
                                    <td><input type="text" class="form-control" name="entry_year" value="{{$user->entry_year}}"></td>
                                    <td><input type="text" class="form-control" name="sex" value="{{$user->sex}}"></td>
                                    <td><input type="text" class="form-control" name="phone" value="{{$user->phone}}"></td>
                                    <td><input type="text" disabled class="form-control" name="email" value="{{$user->email}}"></td>
                                    <td><input type="text" class="form-control" name="siemester" value="{{$user->siemester}}"></td>
                                    <td><input type="text" class="form-control" name="date_of_birth" value="{{$user->date_of_birth}}"></td>
                                    <td><input type="text" class="form-control" name="state_of_origin" value="{{$user->state_of_origin}}"></td>
                                    <td><input type="text" class="form-control" name="local_government" value="{{$user->local_government}}"></td>
                                    <td><input type="text" class="form-control" name="parent_name" value="{{$user->parent_name}}"></td>
                                    <td><input type="text" class="form-control" name="parent_address" value="{{$user->parent_address}}"></td>
                                    <td><input type="text" class="form-control" name="parent_phone" value="{{$user->parent_phone}}"></td>
                                    <td><input type="text" class="form-control" name="payment_status" value="{{$user->payment_status}}"></td>
                                    <input type="hidden" class="form-control" name="path" value="{{$user->path}}">
                                </form>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-edit fa-fw"></i> Photo upload
            </div>
            <div class="panel-body">
                <!-- <form class="photoupload"  enctype="multipart/form-data"> -->
                <form method="post"  enctype="multipart/form-data" action="<?php echo URL::to('/');?>/adminphotoupload/<?= Auth::user()->id?>">
                    <div class="row container-fluid" style="display: inline !important;">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        <!-- <input type="file" name="path" class="form-input" style="width: 90%;float: left;" required /> -->
                        <input type="file" name="path" class="form-control"  style="width: 90%;float: left;" required />
                        {{csrf_field()}}
                        <button type="submit" style="float: right;margin-top: 2px;" class="btn btn-sm btn-default">
                            <i class="fa fa-camera"></i>
                        </button>
                        <button id="loading" style="float: right;margin-top: 2px;"  class="btn btn-sm btn-warning" disabled>
                            <i class="loader fa fa-plus"></i>
                        </button>
                        <button id="done" style="float: right;margin-top: 2px;" class="btn btn-sm btn-success">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> Create an admin user
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="container-fluid">
                <h3 class="text-center">ADMIN CREATE</h3>
                <form class="createadminuser">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="surname" required="" placeholder="Surname*">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="firstname" required="" placeholder="Firstname*">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="othername" required="" placeholder="Othername*">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <select type="text" class="form-control" name="programme_type" required="">
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select type="text" class="form-control" name="programme_mode" required="">
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select type="text" class="form-control" name="department" required="">
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="phone" required="" placeholder="Enter phone number*">
                            </div>
                            <div class="col-lg-4">
                                <input type="email" class="form-control" name="email" required="" placeholder="Enter email address*">
                            </div>
                            <div class="col-lg-4">
                                <input type="password" class="form-control" name="password" required="" placeholder="Enter password*">
                            </div>
                        </div>
                    </div>
                    <div class="mbr-buttons">
                    <button type="submit" class="btn form-control btn-default">SUBMIT FORM</button>
                    <button id="loading"  class="btn form-control btn-warning">
                        <i class="loader fa fa-plus"></i>  SUBMITING...
                    </button>
                    <button id="done" class="btn form-control btn-success">
                        <i class="fa fa-check"></i> SUBMITED
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-dashboard fa-fw"></i> More admin control
            </div>
            <div class="panel-body">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis sint saepe nihil accusamus numquam facere asperiores itaque voluptates dolore exercitationem similique eaque nesciunt incidunt atque dolor, deleniti commodi. Eligendi, sint.
            </div>
        </div>
    </div>
    <div class="col-lg-3">
    <div class="chat-panel panel panel-default">
        <div class="panel-heading">
        <i class="fa fa-bell fa-fw"></i><i class="fa fa-comment fa-fw"></i> Tasks & Chat
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="chat">
                @if($tasks = App\AdminTask::all())
                    @foreach($tasks as $task)
                        <li class="left clearfix">
                            <span class="chat-img pull-left">
                                <img src="uploads/{{$task->path}}" width="50" height="50" alt="User Avatar" class="img-circle" />
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">{{$task->author}}</strong>

                                    @if($task->user_id == Auth::user()->id)
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <ul class="dropdown-menu well slidedown">
                                            <li>
                                                <form action="{{url('/tasksrefresh')}}" method="post">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-info form-control">
                                                        <i class="fa fa-refresh fa-fw"></i> Refresh
                                                    </button>
                                                </form>
                                            </li>
                                                <form action="{{url('/tasksdelete')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{$task->id}}">
                                                    <button class="btn btn-danger form-control">
                                                        <i class="fa fa-trash fa-fw"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{url('/taskscompleted')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{$task->id}}">
                                                    <button class="btn btn-success form-control">
                                                        <i class="fa fa-check fa-fw"></i> completed
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                    <small class="pull-right text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i> {{$task->created_at->diffForHumans()}}
                                    </small>
                                </div>
                                <p>
                                    {{$task->content}}
                                </p>
                                    @if($task->task_status == 0)
                                        <small class="text-center text-warning">pending...</small> 
                                    @else
                                        <small class="text-center text-success">completed </small>
                                    @endif
                            </div>
                        </li>
                    @endforeach
                @endif
                @if($tasks->count() < 0)
                    <li class="text-center text-danger">
                        <p>
                            No task available
                        </p>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            <form class="admintasks">
                {{csrf_field()}}
                <div class="input-group">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="author" value="{{Auth::user()->surname}} {{Auth::user()->firstname}}">
                    <input type="hidden" name="path" value="{{Auth::user()->path}}">
                    <input type="hidden" name="task_status" value="0">
                    <input id="btn-input" type="text" name="content" class="form-control" placeholder="Drop a task..." required />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" id="btn-chat">
                            <i class="fa fa-bell"></i>
                        </button>
                        <button id="loading"  class="btn btn-warning" disabled>
                            <i class="loader fa fa-plus"></i>
                        </button>
                        <button id="done" class="btn btn-success">
                            <i class="fa fa-check"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /.panel-footer -->
    </div>
    </div>
</div>
<footer id="todolist"></footer>
<script>
$(document).ready(function(){	
	$(".delete").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/admindeleteprofile",
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
	$(".edit").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/admineditprofile",
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
	$(".changepassword").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/currentadminchangepassword",
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
	$(".createadminuser").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/createadminuser",
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
	$(".admintasks").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/adminposttask",
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
$(document).ready(function() {
    $('#dataTables-example').DataTable({
    responsive: true
    });
});
</script>
@endsection