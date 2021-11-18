<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{env('APP_NAME','Admin Panel')}} | @yield('title')</title> 
  <!-- plugins:css -->
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
  <link rel="stylesheet" href="<?php echo asset('dash/vendors/feather/feather.css') ?>">
  <link rel="stylesheet" href="<?php echo asset('dash/vendors/mdi/css/materialdesignicons.min.css') ?>">
 
  <link rel="stylesheet" href="<?php echo asset('dash/vendors/simple-line-icons/css/simple-line-icons.css') ?>">
  <link rel="stylesheet" href="<?php echo asset('dash/vendors/css/vendor.bundle.base.css') ?>">
  <!-- endinject -->
 
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo asset('dash/css/vertical-layout-light/style.css') ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo asset('dash/images/favicon.png') ?>" />
  @stack('css')
</head>
<body>