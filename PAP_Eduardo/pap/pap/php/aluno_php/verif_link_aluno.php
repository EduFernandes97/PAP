<?php
	if(!$_POST['page']) die("0");

	$page = $_POST['page'];

	if(file_exists('../../aluno/'.$page))
		echo '../aluno/'.$page;

	else echo 'Naoexisteapagina!';
?>