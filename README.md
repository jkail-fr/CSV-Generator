#CsvGenerator

##Project overview
This project was made in order to generate full .csv file, based on few columns.
The point is to manipulate and add data to get a proper file without manual processing.

The script allow you to choose a process, a file and some fields and will then act according to the selected process before returnign a nice .csv.

###Note for dev's
As a PHP developper you'll be able to easily add process in order to fit your needs
The project included .csv are based on moodle bulk upload .csv but you can change everything you want

##Changing the script
If it doesn't fit your need, you can change it without problem.
I tried to make it easy to change.
All the functions are in /includes/functions.php
All the process are in /includes/process
The script is made of 3 pages : The index (to choose your process), the upload(to upload the file and fill the fields), and the result (to process the data and download the file
The uploaded file are stored in /temp and deleted 
The result files are stored in results but are not deleted
The file is created by importing the header and then the values.

###Changing the style
You have a style.css in the css folder.
If you want to add files in the header of all the pages, please use the /include/head.php

###Changing the description and default fields
It's basic HTML, store in the include folder

###Adding a process
1. Create a folder with the name of the process in /includes/process
2. Create a file called "additionalFields.php" where you will put your fields here (through array and function)
3. Create a file called "processing.php" where you will manage the data. You can use the functions if you want, to write header and data in the resulting file. If you want you can create a specific file name with the variable $fileName
4. Add an option to the dropdown list on index.php. The value as to be the folder name in /includes/process
5. Add a template .csv for this template called "model.csv"(not mandatory).

###Usefull functions
addHeader : Will add the header to the selected array through array push. Used to add header to csv columns
addValue : Will add the value to all the line of the csv file
createName : Create the fileName. You can change the extension
addFields : Will generate html fields (input type="text"), based on array ([fieldName] => fieldValue)
createPassword : Create a password with random letter / numbers / character. The parameter in the number of character of the password.
createHardpassword : Create a 1 letter, 1 capital, 1 number, 1 character, string for every loop. the parameter of the function is the number of loops 
createFile : Allows you to create / write in a file. Can be used to create several files (used in results.php and in the MoodleAdvanced processing.