<?php
    session_start();

	unset($_SESSION['login']);
	unset($_SESSION['email']);
	

	header("Location: index.php")


?>