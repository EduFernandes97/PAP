<?php
	if(!$_POST['page']) die("0");

	$page = $_POST['page'];

	if(file_exists('../../admin/'.$page))
		echo '../admin/'.$page;

	else echo 'Naoexisteapagina!';
?>