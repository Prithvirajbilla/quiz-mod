<?php

 session_start();

 if(isset($_SESSION['id']))
 {
    if($_SESSION['id'] != "")
    {
      header("Location: /mnp/quiz.php");
     exit;
    }
 }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mnp Club quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Flatstrap by Littlesparkvt.com">
    <meta name="author" content="littlesparkvt.com">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/css/bootstrap-flat.min.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
    #awesome
    {
      margin-top : 15%;
    }
    #awesome2
    {
      margin-top: 5%;
    }

    </style>
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./index.php">MNP club</a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li class="active">
                <a href="./index.php">Home</a>
              </li>
              <li class="">
                <a href="./leader.php">Leader Board</a>
              </li>
              <li class="">
                <a href="./rules.html">Rules</a>
              </li>
              <li >
                <a href="./logout.php"> Logout </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row" id="awesome">
        <?php
          $error = "<div class=\"alert alert-info\">";
          $error = $error . "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
          $error = $error . "<strong>Come back Later!!!! </strong> &nbsp;&nbsp; We hope you enjoyed a Lot.</div>";
          if(isset($_GET['welcome']))
              {
                if($_GET['welcome'] == "cmb")
                {
                  echo $error;
                }
              }
        ?>
        <div class="page-header" style="text-align:center !important">
          <h1> Mnp Club Quiz </h1>
          <small>Organised by STAB 2013</small>
        </div>
        <div class="span6 offset3">
          <form class="form-horizontal" id="awesome2" method='post' action="includes/login.php">

            <?php 
              $error = "<div class=\"alert alert-error\">";
              $error = $error . "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
              $error = $error . "<strong>Warning!</strong> Best check yo self, you're not looking too good.</div>";
              if(isset($_GET['error']))
              {
                if($_GET['error'] == "1")
                {
                  echo $error;
                }
              }

            ?>
              <div class="control-group">
                <label class="control-label" for="ldap">Ldap Username</label>
                <div class="controls">
                  <input type="text" id="ldap" placeholder="ldap id" name="ldapid">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                  <input type="password" id="inputPassword" placeholder="Password" name="password">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn">Sign in</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>
    <script src="assets/js/application.js"></script>

  </body>
</html>
