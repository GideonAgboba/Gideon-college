<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Gideon | profiles</title>
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
</head>
<body>
    @include('users.layouts.navbar')
    <div class="content-wrapper pt-5 mt-5">
        <div class="container-fluid">
            @yield('contents')
        </div>
    </div>

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
    <!-- Custom scripts for this page-->
    <script src="profiles/js/sb-admin-datatables.min.js"></script>
    <script src="profiles/js/sb-admin-charts.min.js"></script>
</body>
</html>