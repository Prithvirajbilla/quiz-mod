<?php
  session_start();
  if(!isset($_SESSION['id']))
  {
    header("Location: /mnp/index.php");
    exit;
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
      margin-top : 16%;
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
              <li >
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
    <!-- Div container for question -->
    <div class="container">
      <div class="row">
        <div class="span9 offset2" id="awesome">
        <?php
        function alert($type,$mess)
        {
          $error = "<div class=\"alert ". $type. "\">";
          $error = $error . "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
          $error = $error .$mess."</div>";

          return $error;
        }

        //error handling maxxxx
        if(isset($_GET['error']))
        {
          if($_GET['error'] == '1')
          {
              echo alert("alert-error","<strong> Oh snap! </strong> We are sorry to say that your answer is wrong!!");
          }
        }
        if(isset($_GET['aww']))
        {
          if($_GET['aww'] == 'fck')
          {
            echo alert("alert-info","<strong> What!! </strong> You already solved this question");
          }
          elseif ($_GET['aww'] == "done") 
          {

            echo alert("alert-success","<strong> Congrats !! </strong> Your answer is correct. Check the leader board.");
            # code...
          }
          elseif($_GET['aww'] == '1')
          {
            echo alert("alert-success","<strong> Welcome !! </strong> Start solving these puzzles.");
          }
          elseif($_GET['aww'] == '2')
          {
            echo alert("alert-info","<strong> Welcome Back!! </strong> Awww, we are glad that you are back.");
          }
        }  echo session_id();


        ?>



          <?php
            include ("config/settings.php");
            include ("config/config.php");
            $ques = " <div class=\"page-header\" style=\"text-align:center !important\">";
            $ques = $ques . "<h1>". $QUESTION . "</h1> </div>";
            $ques = $ques . "<h4>" . $QUESTION_DESC. "</h4>";
            echo $ques;
            ?>



          <form class="form-horizontal" id="awesome2" method='post' action="includes/quiz.php">
            <div class="controls">
              <input class="span5" type="text" placeholder="answer" name="answer" autocomplete='off'>
            </div>
            <br/>
            <div class="controls">
              <input class="btn span3 btn-primary" type="submit" >
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
