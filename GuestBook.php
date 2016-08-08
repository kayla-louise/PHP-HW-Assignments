<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Guest Book</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
<h1>Guest Book</h1>
<?php
if (isset($_GET['action'])){
	if ((file_exists("GuestBook/guests.txt"))
		&& (filesize("GuestBook/guests.txt")
			!=0)){
		$guestArray = file("GuestBook/guests.txt");
	switch ($_GET['action']){
		case 'Remove Duplicates' :
		$guestArray = array_unique($guestArray);
		$guestArray = array_values($guestArray);
		break;
		case 'Sort Ascending':
		sort($guestArray);
		break;
		case 'Shuffle':
		shuffle($guestArray);
		break;
	}//end of the switch statement
	if (count($guestArray)>0) {
		$Newguests = implode($guestArray);
		$guestStore = fopen("GuestBook/guests.txt", "wb");
		if ($guestStore === false)
			echo "There was an error updating the guest file\n";
		else {
			fwrite($guestStore, $Newguests);
			fclose($guestStore);
		}
	}
	else
		unlink("GuestBook/guests.txt");
	}
}
if (isset($_POST['submit'])){
	$guestToAdd = stripslashes($_POST['guestName']) . "\n";
	$Existingguests = array();
	if (file_exists("GuestBook/guests.txt")
		&& filesize("GuestBook/guests.txt")
		>0) {
		$Existingguests = file("GuestBook/guests.txt");
	}
	if (in_array($guestToAdd, $Existingguests)){
		echo "<p>The guest you entered already exists!<br />\n";
		echo "Your guest was not added to the list.</p>";
	}
	else {
		$guestFile = fopen("GuestBook/guests.txt", "ab");
		if ($guestFile === false)
			echo "There was an error saving your message!\n";
		else {
			fwrite($guestFile, $guestToAdd);
			fclose($guestFile);
			echo "Your guest has been added to the list.\n";
		}
	}
	if ((!file_exists("GuestBook/guests.txt"))
		|| (filesize("GuestBook/guests.txt")
			==0))
		echo "<p>There are no guests in the list.</p>\n";
	else {
		$guestArray = file("GuestBook/guests.txt");
		echo "<table border=\ "1\" width=\"100%\" style=\"background-color:lightgray\">\n";
		foreach ($guestArray as $guest){
			echo "<tr>\n";
			echo "<td>" . htmlentities($guest) . "</td>";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

?>
<p>
<a href="GuestBook.php?action=Sort%20Ascending">
	Sort guest List</a><br />
<a href="GuestBook.php?action=Remove%20Duplicates">
	Remove Duplicate guests</a><br />
<a href="GuestBook.php?action=Shuffle">
	Randomize guest List</a><br />
</p>
<form action="GuestBook.php" method="post">
<p>Add A New guest</p>
<p>guest Name: <input type="text" name="guestName" /></p>
<p><input type="submit" name="submit" value="Add guest To List" />
<input type="reset" name="reset" value="Reset guest Name" /></p></form>
</body>
</html>