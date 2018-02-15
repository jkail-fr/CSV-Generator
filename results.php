<?php
$emplacement = './temp/temp.csv';
$moving = move_uploaded_file($_FILES['file']['tmp_name'],$emplacement);
require_once ('includes/functions.php');

//We get the data from the csv file
$file_handle = fopen($emplacement, "r");
$list=array();
while (!feof($file_handle) )
{
	$line_of_text = fgetcsv($file_handle, 1024,";");
	
	//We remove space in email and space before and after other string and we apply changes to string
	$line_of_text[0] = strtolower(str_replace(' ','', $line_of_text[0]));
	$line_of_text[1] = ucwords(strtolower(trim($line_of_text[1])));
	//if php > php5.4 try :
	//$line_of_text[1] = ucwords(strtolower(trim($line_of_text[1])),"-");
	$line_of_text[2] = strtoupper(trim($line_of_text[2]));
	

		// we generate the username based on the choice made in step 3 : username format
		if ($_POST['username'] == 'email')
		{
			$username = $line_of_text[0];
		}
		elseif ($_POST['username'] == 'generate')
		{
			$username = mb_strtolower($line_of_text[1],mb_detect_encoding($line_of_text[1])).'.'.mb_strtolower($line_of_text[2],mb_detect_encoding($line_of_text[2]));
		}
		else 
		{
			$username='';
		}
	// We insert the data in an array to be written in the file later
	$list[] = array($line_of_text[0], $username, $line_of_text[1], $line_of_text[2]);
}
fclose($file_handle);

// We create the header column name and put them in the file
$entete[]=array('email', 'username', 'firstname', 'lastname');
?>

<!doctype html>
<html lang="en">
<head>
<?php
include('./includes/head.php');
?>
</head>
<body>
	<section id="container">
		<h1>Download</h1>
		<hr>
		<h2>Processing</h2>
		<?php		
		if ($moving) echo "<p>successfully moved to /temp - Processing the file</p>";
		
		//Adding the default fields
		// We check if there is cohorts and we add the header and value
		if (!empty($_POST['cohort1']))
		{
			$entete = addHeader('cohort1', $entete);
			$list = addValue($_POST['cohort1'], $list);
		}
		
		if (!empty($_POST['cohort2']))
		{
			$entete = addHeader('cohort2', $entete);
			$list = addValue($_POST['cohort2'], $list);
		}
		
		if (!empty($_POST['cohort3']))
		{
			$entete = addHeader('cohort3', $entete);
			$list = addValue($_POST['cohort3'], $list);
		}
		
		// We inject the treatment of the process
		if (isset($_POST['process']))
		{
		$process = $_POST['process'];
		$location = './includes/process/'.$process.'/processing.php';
		require_once($location);
		}
		else
		{
		echo "There an error in the process. please try again";
		}

	//We inject data (header then data) into the new csv file
		// We set a default file name if "$downlaod doesn't exist		
		if (isset($fileName))
		{
			$download ='./results/'.$fileName;
		}
		else
		{
			$download = './results/file.csv';
		}
		
		//We create and write our data in the file 
		createFile($download,$entete);
		createFile($download,$list);


		// We delete le temp file
		$delete = unlink($emplacement);
		if ($delete) echo "<p>successfully deleted temp file</p>";
		?>
	
		<hr>
		<h2>Step 4 : Download the file</h2>
		<p><a href="<?php echo $download;?>">My csv file</a></p>
		<hr>
		<p><a href="./index.php">Back to process selection</a></p>
	</section>
</body>
</html>
