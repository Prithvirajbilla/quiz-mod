<?php
 include ("../config/config.php");
if(!isset($_POST['ldapid']) or !isset($_POST['password']))
{
	header("Location: /mnp/index.php?error=1" );
	exit;
}
else
{
	if($_POST['ldapid'] == "" or $_POST['password'] == "")
	{
		header("Location: /mnp/index.php?error=1");
		exit;
	}
	else
	{
		$ldap_id = $_POST['ldapid'];
	    $password = $_POST['password'];
	    $password = base64_encode($password);
	    $url = "http://www.cse.iitb.ac.in/~prithvirajbilla/ldap-api/index.php?user=".$ldap_id."&pass=".$password;
	    $json = file_get_contents($url);
	    $result_array = json_decode($json, TRUE);
		$bind = $result_array["bind"];
		if($bind)
		{
			$query = "select * from  user WHERE ldap='$ldap_id'";
			$result = mysql_query($query);
			$result_arr = mysql_fetch_array($result);
			if($result_arr['id'] != "")
			{
				//starting sessions
				session_start();
				$_SESSION['id'] = $result_arr['id'];
				$_SESSION['ldap'] = $result_arr['ldap'];
				$_SESSION['fname'] = $result_arr['fname'];
				$_SESSION['lname'] = $result_arr['lname'];

				header("Location: /mnp/quiz.php?aww=1");
				exit;
			}
			else
			{
				$fname = $result_array["fname"];
        		$lname = $result_array["lname"];
        						//starting sessions
				session_start();

				$_SESSION['ldap'] = $ldap_id;
				$_SESSION['fname'] = $result_array['fname'];
				$_SESSION['lname'] = $result_array['lname'];

        		$sql = "INSERT INTO user (ldap,fname,lname) VALUES ('$ldap_id','$fname','$lname')";
				$re = mysql_query($sql);
				if($re === FALSE) 
				{
					echo "what the fuck";
    				die(mysql_error()); // TODO: better error handling
				}

				$_SESSION['id'] = $re['id'];

				header ("Location: /mnp/quiz.php?aww=2");
				exit;
			}

		}
		else
		{
			header("Location: /mnp/index.php?error=1");
			exit;

		}

	}
}

?>