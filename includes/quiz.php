<?php
	include ("../config/config.php");
	session_start();
	$id = $_SESSION['id'];
	$qid = 1;
	$ques_answer = "ashima";
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
	if($res['sid'] == "")
	{
		if($answer == $ques_answer)
		{
			$insert_query = "insert into solved (id,qid) values ('$id','$qid') ";
			$res = mysql_query($insert_query);
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