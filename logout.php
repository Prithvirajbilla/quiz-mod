<?php
/*unset($_SESSION['id']);
unset($_SESSION['ldap']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
*/
session_start();
session_destroy();
$_SESSION = array();
header("location: /mnp/index.php?welcome=cmb");
exit;

?>