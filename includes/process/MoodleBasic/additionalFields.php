<?php
$position = getcwd().'/includes/functions.php';
require_once($position);

// We create an array with the text input and value and then we call the function that will generate the html code
$newFields = array('institution' =>'', 'password'=>'changeme');
addFields($newFields);
?>

<!--add you other fields and comments as html under-->
<p>The default value is "changeme". It will force users to change the password on their first login</p>
<p><strong>The csv file as to be "email; firstname; lastname" without header row</strong></p>