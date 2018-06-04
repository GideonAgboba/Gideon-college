@extends('admin.layouts.app')
@section('contents')
@include('layouts.addits')
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
</script><script>
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
<br>
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
                        @if($users = App\User::where('role_id', 2)->get())
                            @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>{{$user->id}}</td>
                                <td>
                                    <form class="delete">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-fw fa-trash"></i>
                                        </button>
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