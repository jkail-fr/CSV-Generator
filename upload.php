<!doctype html>
<html lang="en">
<head>
	<?php
	include('./includes/head.php');
	?>
</head>
<body>
	<section id="container">
		<h1>CSV Generator</h1>
		<?php
		// We check if var process is sent with POST and then we put the value une $process
		include('./includes/description.html');
		if (isset($_POST['process']))
		{
			$process=$_POST['process'];
			echo '<p>You choose the process: '.$process.'</p>';
			echo '<p><a href="./includes/process/'.$process.'/model.csv">Download the .csv model for this process</a></p>';
			
		?>
			<form action="results.php" method="POST"  enctype="multipart/form-data">
			<input type="hidden" name="process" value="<?php echo $process;?>" />
			<?php
			//We include the regular fields
			require_once('./includes/commonFields.html');
				
			//We include the additionnal fields based on the process name and folder
			include('./includes/process/'.$process.'/additionalFields.php');

			?>
			<input type="submit" value="Next step">
			</form>
			<p><a href="./index.php">Back to process selection</a></p>

		<?php
		}
		else
		{
			echo "Non existing process. Go back to process selection screen";
			header('Location: ./index.php');
		}
		?>
	</section>
</body>
</html>
