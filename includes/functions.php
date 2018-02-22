<?php 
function addHeader($header, $dest1)
{
		$newArray = $dest1;
		array_push($newArray[0], $header);
		echo '<p>adding '.$header.'</p>';
		return $newArray;
}

function addValue($value,$dest)
{
		$newArray = $dest;
		$total = count($newArray);
		$i=0;
		while ($i < $total)
			{
			array_push($newArray[$i], $value);
			$i++;
			}
		echo '<p>value added</p>';
		return $newArray;
}

function addPassword($passDifficulty,$dest)
{
		$newArray = $dest;
		$total = count($newArray);
		$i=0;
		if ($passDifficulty =='high')
		{
		while ($i < $total)
			{
			array_push($newArray[$i], createHardPassword(2));
			$i++;
			}
		}
		elseif ($passDifficulty =='medium')
		{
			while ($i < $total)
			{
			array_push($newArray[$i], createPassword(8));
			$i++;
			}
		}
		echo '<p>value added</p>';
		return $newArray;
}

function createName($name,$format)
{
		$setTime = date('Y-m-d');
		$fileName= $name."_".$setTime.".".$format;
		return $fileName;
}

function addFields($fieldsArray) 
{ 	
	ob_start();
	foreach ($fieldsArray as $key=>$value)
	{
	?>
		<label for="<?php echo $key; ?>"><?php echo $key; ?> : </label>
		<input type="text" value="<?php echo $value; ?>" id="<?php echo $key; ?>" name="<?php echo $key; ?>" placeholder="<?php echo $key; ?>" /><br>
	<?php
	}
	$myFields = ob_end_flush();
	return $myFields;
}

function createPassword($length)
// base function fouded here "https://stackoverflow.com/questions/33134021/generate-a-random-password-in-php". 
//I just added the specialchar and created a second function based on that
{
   $string = "";
   $chars = "abcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!-/@?$&";
   $size = strlen($chars);
	for ($i = 0; $i < $length; $i++) 
	{
		$string .= $chars[rand(0, $size - 1)];
	}
   return $string; 
}

function createHardPassword($loop)
{
	$string = "";
   $chars = "abcdefghijklmanopqrstuvwxyz";
   $caps = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $number = "0123456789";
   $special = "!-/@?$&";
   $i= 0;
   while ($i < $loop) 
   {
	   $string = $string .= $chars[rand(0, 25)];
	   $string = $string.$caps[rand(0, 25)];
	   $string= $string.$number[rand(0,9)];
	   $string = $string.$special[rand(0,6)];
	   $i++;
   } 
   return $string; 
}

function createFile($fileLocation, $data)
{
    $fp = fopen($fileLocation, 'w');
    //Un comment the line under to make your file encode as UTF-8
    //fprintf($fp, chr(0xEF).chr(0xBB).chr(0xBF));
    foreach ($data as $fields)
		{
			fputcsv($fp, $fields,";");
		}
	fclose($fp);
	return $fileLocation;
}
?>