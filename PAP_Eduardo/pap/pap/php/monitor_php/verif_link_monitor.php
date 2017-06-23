<?php
	if(!$_POST['page']) die("0");

	$page = $_POST['page'];

	if(file_exists('../../monitor/'.$page))
		echo '../monitor/'.$page;

	else echo 'There is no such page!';
?>