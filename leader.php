<?php
  session_start();
  $slogout = false;
  if(!isset($_SESSION['id']))
  {
    $slogout = true;
    
  }
?>
<?php
include ("config/config.php");
include ("config/func.php");
$query = "select h.fname,h.ldap,sum(h.time) as timespent ,count(h.qid) as ques from (select * from user natural join (solved natural join question) where status<>'no') as h group by h.id,h.fname,h.ldap order by count(qid) desc,time";
$res = mysql_query($query);
$count = 1;
$leader_board = "";
while($row = mysql_fetch_array($res))
{
	$leader_board = $leader_board . "<tr>";
	$leader_board =$leader_board . "<td>" .$count . "</td>";
	$leader_board = $leader_board . "<td>".$row['fname']."</td>";
	$leader_board = $leader_board . "<td>".$row['ldap'] . "</td>";
	$leader_board = $leader_board .  "<td>".secs_to_h($row['timespent'])."</td>" ;       
	$leader_board = $leader_board .  "<td>".$row['ques']."</td></tr>";   
	$count = $count + 1;       
	            
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Puzzle of the week</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Puzzle of the week">
    <meta name="author" content="Prithviraj Billa">

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
      margin-top : 8%;
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
              <li class="active">
                <a href="./leader.php">Leader Board</a>
              </li>
              <li class="">
                <a href="./rules.html">Rules</a>
              </li>
              <?php if(!$slogout) { ?>
              <li >
                <a href="./logout.php"> Logout </a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container" id="awesome">
		<table class="table">
	        <thead>
	          <tr>
	            <th>#</th>
	            <th>First Name</th>
	            <th>Ldap ID</th>
	            <th>Timespent</th>
	            <th>Questions Solved </th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php echo $leader_board; ?>
	        </tbody>
	      </table>
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
