<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>nanosoft/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>nanosoft/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>nanosoft/datepicker/css/bootstrap-datepicker.min.css">
    <!-- Theme CSS -->
    <link href="<?php echo base_url(); ?>nanosoft/css/agency.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>nanosoft/css/custom.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>nanosoft/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>nanosoft/datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- GRAPH -->
    <script src="<?php echo base_url(); ?>nanosoft/graph/fusioncharts.js"></script>
  	<script src="<?php echo base_url(); ?>nanosoft/graph/fusioncharts.charts.js"></script>
  	<script src="<?php echo base_url(); ?>nanosoft/graph/fusioncharts.theme.fint.js"></script>

</head>
<body id="page-top" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo base_url() ?>">NanoSoft</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="<?php echo base_url() ?>"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url() ?>employees">Employees</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url() ?>employees/set_attendances">Set Attendances</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url() ?>employees/view_attendances">View Attendances</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url() ?>file_management">File Management</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
