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

	// Data changes
	// We re-open the csv to parse the extra columns : 
	$i=0;
	$file_handle = fopen($emplacement, "r");
	while (!feof($file_handle) )
	{
		$line_of_text = fgetcsv($file_handle, 1024,";");
		
		// We alterate the value we want
		switch($line_of_text[3])
		{
			case 'Apple':
				$line_of_text[3] = 'Fruit';
				array_push($list[$i], $line_of_text[3]);
			break;
			
			case 'Potato' :
				$line_of_text[3] = 'Vegetable';
				array_push($list[$i], $line_of_text[3]);
			break;
			
			default	:
				array_push($list[$i], $line_of_text[3]);
		}
		$i++;
	}
	fclose($file_handle);
	
	//Downloading extra file 
	$extraFile = createFile('./results/extra.csv', $list);
	echo '<p><a href="'.$extraFile.'">My extra file</a></p>';
	
	
	//We generate a file name and format for this process
	$process = $_POST['process'];
	$fileName = createName($process,'csv');
	
	//End of process
?>