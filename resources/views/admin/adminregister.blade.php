@include('layouts.addits')
<title>Gideon | Admincreate</title>
  <link rel="shortcut icon" href="logo.png" type="image/png">
  <link rel="icon" href="logo.png" type="image/png">
  <!-- Bootstrap core CSS-->
  <link href="profiles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="profiles/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="profiles/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="profiles/css/sb-admin.css" rel="stylesheet">
  <link href="profiles/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/main.css">
    <div class="navbar-brand ml-3 mt-2">
        <a href="#" class="navbar-logo pull-left"><img src="logo.png" alt="Mobirise"></a>
        <a class="text-white nav-link" href="{{url('/')}}">Gideon College</a>
    </div>
<div class="card card-ie">
    <div class="card-header">
        <i class="fa fa-user fa-fw"></i> Create an admin user
    </div>
    <div class="card-body">
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
                    <button type="submit" class="btn form-control btn-dark">SUBMIT FORM</button>
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
				url: "/makeadminuser",
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
<style>
body{
    background: red;
}
.card-ie{
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
}
</style>
    <!-- Bootstrap core JavaScript-->
    <script src="profiles/vendor/jquery/jquery.min.js"></script>
    <script src="profiles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="profiles/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="profiles/vendor/chart.js/Chart.min.js"></script>
    <script src="profiles/vendor/datatables/jquery.dataTables.js"></script>
    <script src="profiles/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="profiles/js/sb-admin.min.js"></script>
    <script src="addits/pace.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="profiles/js/sb-admin-datatables.min.js"></script>
    <script src="profiles/js/sb-admin-charts.min.js"></script>