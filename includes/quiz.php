<?php
	include ("../config/config.php");
	include ("question.php");
	session_start();
	$id = $_SESSION['id'];
	$qid = $QID;
	// setting time zone
  $timezone = "Asia/Calcutta";
    date_default_timezone_set($timezone);

	$ques_answer = $QUESTION_ANSWER;
if(!isset($_POST['answer']))
{
	header("Location: /mnp/quiz.php?error=1");
	exit;
}
else
{
	$answer = $_POST['answer'];
	$solved_query = "select * from solved where qid='$qid' and id='$id' ";
	$res = mysql_query($solved_query);
	$res = mysql_fetch_array($res);
	if($res['status'] == "no")
	{
		if($answer == $ques_answer)
		{
			/**updating the f**ing table **/
			$now_status = 'yes';
      		$time = date('Y-m-d H:i:s');
      		$stime = $res["stime"];
      		$start = new DateTime($stime);
    		$interval = strtotime($time) - strtotime($stime);
			$update_query = "update solved set status='$now_status',etime='$time',time='$interval' where id='$id' and qid='$qid'";
			$res = mysql_query($update_query);
			if($res === FALSE) 
			{
				echo "what the fuck";
				die(mysql_error()); // TODO: better error handling
			}
			header("Location: /mnp/quiz.php?aww=done");
			exit;
		}
		else
		{
			header("Location: /mnp/quiz.php?error=1");
		}
	}
	else
	{
		header("Location: /mnp/quiz.php?aww=fck");
		exit;
	}
}





?>