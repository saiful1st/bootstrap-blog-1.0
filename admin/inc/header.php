<?php
    include '../lib/Session.php';
    Session::checkSession();
    include '../config/config.php';
    include '../lib/Database.php';
    include '../format/Format.php';
    $database = new Database();
    $format = new Format();
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <!-- Web config-->

    <!-- TABLE OF CONTENTS.
    Use search to find needed section.
    ===================================================================
    | 01. #CSS               | All CSS links and file paths           |
    | 02. #FAVICONS          | Favicon icon, app icons                |
    | 03. #BODY              | Body tag                               |
    | 04. #SIDEMENU          | Dashboard panel & left navigation      |
    | 05. #MAIN              | Dashboard right wrapper                |
    | 06. #VIEW              | Dashboard right wrapper inner wrapper  |
    | 07. #TOP               | Top header navigation                  |
    | 08. #TOP NAV           | Top header right navigation            |
    ===================================================================
    
    -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminHero</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <!-- lib-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    <!--
    link(rel='stylesheet' href='assets/stylesheets/ionicons.css')
    link(rel='stylesheet' href='assets/stylesheets/font-awesome.css')
    link(rel='stylesheet' href='assets/stylesheets/weather-icons.min.css')
    link(rel='stylesheet' href='assets/stylesheets/animate.css')
    link(rel='stylesheet' href='assets/stylesheets/glyphicon.css')
    
    -->

    <!--
    plugin
    link(rel='stylesheet' href='assets/stylesheets/plugin/bootstrap-table.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/nifty-modal.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.bootstrap-touchspin.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/select2.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/multi-select.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/ladda.min.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/daterangepicker.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.timepicker.css')
    link(rel="stylesheet" href="assets/stylesheets/plugin/jqvmap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-submenu.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/code.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.dataTables.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/dataTables.bootstrap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.gridster.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/summernote.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-markdown.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-select.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/asColorPicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-datepicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery-labelauty.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.carousel.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.theme.default.min.css")
    
    -->

    <!-- Theme-->
    <!-- Concat all lib & plugins css-->
    <link id="mainstyle" rel="stylesheet" href="assets/stylesheets/theme-libs-plugins.css">
    <link id="mainstyle" rel="stylesheet" href="assets/stylesheets/skin.css">

    <!-- Demo only-->
    <link id="mainstyle" rel="stylesheet" href="assets/stylesheets/demo.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/jquery-ui-timepicker-addon.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">

    <!-- This page only-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]>
    <script src="assets/scripts/lib/html5shiv.js"></script>
    <script src="assets/scripts/lib/respond.js"></script><![endif]-->
    <script src="assets/scripts/lib/modernizr-custom.js"></script>
    <script src="assets/scripts/lib/respond.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/scripts/plugins/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
        $('#table_id').DataTable();
        } );
    </script>

    <!-- Possible Classes
    ** Gradient style:
    * orchid
    * cadetblue
    * joomla
    * influenza
    * moss
    * mirage
    * stellar
    * servquick
    
    ** Flat style:
    * f-dark
    * f-dark-blue
    * f-blue
    * f-green
    
    ** Layout control
    * minibar
    * layout-drawer (changed the var on top)
    
    e.g
    <body class="moss layout-drawer">
    -->
  </head>

  <body class="orchid  ">