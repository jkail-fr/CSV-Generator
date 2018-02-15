<?php
	//Begin selected process
	//Adding password based on password difficulty
	$entete = addHeader('password', $entete);
	$difficulty = $_POST['passwordDifficulty'];
	$list = addPassword($difficulty, $list);

	//adding institution
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