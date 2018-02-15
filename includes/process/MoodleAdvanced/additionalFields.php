<?php
$position = getcwd().'/includes/functions.php';
require_once($position);

// We create an array with the text input and value and then we call the function that will generate the html code
$newFields = array('institution' =>'');
addFields($newFields);
?>

<!--add you other fields and comments as html under-->
Password Difficulty : 
			<select name="passwordDifficulty">
				<option value="medium">Medium</option>
				<option value="high">High</option>
			 </select>
<p>The advanced mode has an example of data in the file that will be replaced by other data during the data modification.</p>
<p>"Medium" passwords are a number of random characters (8 by default)</p>
<p>"Hard" passwords are series of character with 1 letter, 1 capital, 1 number and 1 special character per series.
<p><strong>The csv file as to be "email; firstname; lastname; object" without header row</strong></p>