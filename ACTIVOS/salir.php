<?php

	session_start();
	unset ($SESSION['nombre']);
	session_destroy();

	header('Location: index.php');

?>