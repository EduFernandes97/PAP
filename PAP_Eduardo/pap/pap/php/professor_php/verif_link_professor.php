<?php
	if(!$_POST['page']) die("0");

	$page = $_POST['page'];

	if(file_exists('../../professor/'.$page))
		echo '../professor/'.$page;

	else echo 'Naoexisteapagina!';
?>