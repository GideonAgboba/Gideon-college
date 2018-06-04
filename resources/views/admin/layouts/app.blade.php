<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gideon | Adminpage</title>
    <link rel="shortcut icon" href="logo.png" type="image/png">
    <link rel="icon" href="logo.png" type="image/png">
    <link rel="stylesheet" href="admin/css/main.css">
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css">

</head>
<body class="navbar-bg-dark">
    <div id="wrapper" class="navbar-bg-dark">
        @include('admin.layouts.navbar')
        <div id="page-wrapper" style="padding-top: 3em;">
            @yield('contents')
        </div>
    </div>


    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="admin/vendor/raphael/raphael.min.js"></script>
    <script src="admin/vendor/morrisjs/morris.min.js"></script>
    <script src="admin/data/morris-data.js"></script>
    <script src="admin/dist/js/sb-admin-2.js"></script>

</body>

</html>