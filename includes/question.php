<?php

$QID = "1";
$ques_query = "select * from question where qid='$QID'";
$ques_res = mysql_query($ques_query);
$ques_row = mysql_fetch_array($ques_res);

$QUESTION = $ques_row['question'];
$QUESTION_DESC = $ques_row['desc'];
$QUESTION_ANSWER = $ques_row['ans'];


?>