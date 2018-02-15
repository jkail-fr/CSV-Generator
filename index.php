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
		include('./includes/description.html');
		?>
		  
		<div class="step1">
		<h2>Step 1 : Choose the process</h2>
		  <form action="upload.php" method="POST">
			  <select name="process">
				<option value="MoodleBasic">Moodle Basic</option>
				<option value="MoodleSecure">Moodle Secure</option>
				<option value="MoodleAdvanced">Moodle Advanced</option>
			  </select>
			  <input type="submit" value="Next step">
		  </form>
		</div>
	</section>
</body>