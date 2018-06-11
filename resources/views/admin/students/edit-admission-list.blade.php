@extends('admin.layouts.app')
@section('contents')
@include('layouts.addits')
<div class="row">
<div class="p-4">
    <div class="panel-heading">
        <h2>ADMISSION LIST</h2>
    </div>
    <div class="panel-body">
    <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-fw fa-table"></i> Edit admission list
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="overflow-x: auto;">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Admission Payment Hash</th>
                                    <th>Surname</th>
                                    <th>Firstname</th>
                                    <th>Othername</th>
                                    <th>Matric</th>
                                    <th>Programme-type</th>
                                    <th>Department</th>
                                    <th>Programme-mode</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Payment-status</th>
                                    <th>Picture</th>
                                    <th>Created</th>
                                    <th>Examination_id</th>
                                    <th>Subject 1</th>
                                    <th>Grade 1</th>
                                    <th>Subject 2</th>
                                    <th>Grade 2</th>
                                    <th>Subject 3</th>
                                    <th>Grade 3</th>
                                    <th>Subject 4</th>
                                    <th>Grade 4</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users = App\User::where('application_status', 0)->where('role_id', 2)->get())
                                    @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <th>
                                            <form class="addmit">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <button type="submit" class="btn btn-success">ADMIT</button>
                                                <button id="loading"  class="btn btn-warning" disabled>
                                                    <i class="loader fa fa-plus"></i> ADDMITING...
                                                </button>
                                                <button id="done" class="btn btn-success" disabled>
                                                    <i class="fa fa-check"></i> ADMITTED
                                                </button>
                                            </form>
                                        </th>
                                        <th>{{$user->admission_payment_hash}}</th>
                                        <td>{{$user->surname}}</td>
                                        <td>{{$user->firstname}}</td>
                                        <td>{{$user->othername}}</td>
                                        <td>{{$user->matric}}</td>
                                        <td>{{$user->programme_type}}</td>
                                        <td>{{$user->department}}</td>
                                        <td>{{$user->programme_mode}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->payment_status}}</td>
                                        <td><img src="uploads/{{$user->path}}" width="50" height="50" alt="photo" class="rounded-circle"></td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        @if($user->programme_mode == 'full-time')
                                            @if($results = App\FullTimeQulificationResult::where('user_id', $user->id)->get())
                                                @foreach($results as $result)
                                                    <td>{{$result->examination_number}}</td>
                                                    <td>{{$result->subject1}}</td>
                                                    <td>{{$result->grade1}}</td>
                                                    <td>{{$result->subject2}}</td>
                                                    <td>{{$result->grade2}}</td>
                                                    <td>{{$result->subject3}}</td>
                                                    <td>{{$result->grade3}}</td>
                                                    <td>{{$result->subject4}}</td>
                                                    <td>{{$result->grade4}}</td>
                                                @endforeach
                                            @endif
                                        @elseif($user->programme_mode == 'part-full')
                                            @if($results = App\FullTimeQulificationResult::where('user_id', $user->id)->get())
                                                @foreach($results as $result)
                                                    <td>{{$result->examination_number}}</td>
                                                    <td>{{$result->subject1}}</td>
                                                    <td>{{$result->grade1}}</td>
                                                    <td>{{$result->subject2}}</td>
                                                    <td>{{$result->grade2}}</td>
                                                    <td>{{$result->subject3}}</td>
                                                    <td>{{$result->grade3}}</td>
                                                    <td>{{$result->subject4}}</td>
                                                    <td>{{$result->subject4}}</td>
                                                @endforeach
                                            @endif
                                        @endif
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
    </div>
</div>
</div>
<script>
$(document).ready(function(){	
	$(".addmit").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/admitstudent",
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
@endsection