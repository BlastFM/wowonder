<?php
	session_unset();
if (!empty($_SESSION['user_id'])) {
	$_SESSION['user_id'] = '';
	$query = mysqli_query($sqlConnect, "DELETE FROM " .  T_APP_SESSIONS . " WHERE `session_id` = '" . Wo_Secure($_SESSION['user_id']) . "'");
}
if (isset($_COOKIE['user_id'])) {
	$query = mysqli_query($sqlConnect, "DELETE FROM " .  T_APP_SESSIONS . " WHERE `session_id` = '" . Wo_Secure($_COOKIE['user_id']) . "'");
	$_COOKIE['user_id'] = '';
    unset($_COOKIE['user_id']);
    setcookie('user_id', null, -1);
    setcookie('user_id', null, -1, '/');
}
	session_destroy();
	header("Cache-Control: no-cache, must-revalidate, max-age=0");
	header("Refresh:0; url=".$wo['config']['site_url']);
	exit();
?>
