<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sign Guest Book</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
<?php
	if(empty($_POST['friendly_staff']) || empty($_POST['luggage_storage']))
		echo "<p>You are missing some survey data! Click your browser's back button to return to the Guest Book form.</p>";
	else {
		$DBConnect = @mysql_connect("localhost", "root", "root");
		if ($DBConnect === FALSE)
			echo "<p> Unable to connect to the database server.</p>"
			. "<p>Error code " . mysql_errno()
			. ": " . mysql_error() . "</p>";
 	}
 	else {
 		$DBName = "guestbook";
 		if (!@mysql_select_db($DBName, $DBConnect)) {
 			$SQLstring = "Create Database $DBName";
 			$QueryResult = @mysql_query($SQLstring, $DBConnect);
 			if ($QueryResult === FALSE)
 				echo "<p>Unable to execute the query.</p>"
 				. "<p>Error code " . mysql_errno($DBConnect)
 				. ": " . mysql_error($DBConnect) . "</p>";
 			else
 				echo "<p>You are the first visitor!</p>";
 		}
 		mysql_select_db($DBName, $DBConnect);
 	
 	$TableName = "visitors";
 	$SQLstring = "SHOW TABLES LIKE '$TableName'";
 	$QueryResult = @mysql_query($SQLstring, $DBConnect);
 	if (mysql_num_rows($QueryResult) == 0) {
 		$SQLstring = "CREATE TABLE $TableName (CountID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, luggage_storage VARCHAR(40), friendly_staff VARCHAR(40))";
 		$QueryResult = @mysql_query($SQLstring, $DBConnect);
 		if ($QueryResult === FALSE)
 			echo "<p>Unable to create the table.</p>"
 			. "<p>Error code " . mysql_errno($DBConnect)
 			. ": " . mysql_error($DBConnect) . "</p>";
 	}
 	$LastName = stripslashes($_POST['luggage_storage']);
 	$FirstName = stripslashes($_POST['friendly_staff']);
 	$SQLstring = "INSERT INTO $TableName VALUES(NULL, '$LastName' , ;$FirstName')";
 	$QueryResult = @mysql_query($SQLString, $DBConnect);
 	if ($QueryResult === FALSE)
 		echo "<p>Unable to execute the query. </p>"
 		. "<p>Error code " . mysql_errno($DBConnect)
 		. ":" . mysql_error($DBConnect) . "</p>";
 		else
 			echo "<h1>Thank you for flying with us!</h1>";
 	
 	mysql_close($DBConnect);
 }

?>	
</body>
</html>