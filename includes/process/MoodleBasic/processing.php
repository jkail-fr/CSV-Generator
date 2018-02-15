<?php
	//Begin selected process			
	if (!empty($_POST['password']))
	{
		$entete = addHeader('password', $entete);
		$list = addValue($_POST['password'], $list);
	}

	if (!empty($_POST['institution']))
	{
		$entete = addHeader('institution', $entete);
		$list = addValue($_POST['institution'], $list);
	}

	//We generate a file name and format for this process
	$process = $_POST['process'];
	$fileName = createName($process,'csv');

	//End of process
?>