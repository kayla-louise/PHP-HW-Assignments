<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Song Organizer</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
<h1>Song Organizer</h1>
<?php
if (isset($_GET['action'])){
	if ((file_exists("SongOrganizer/songs.txt"))
		&& (filesize("SongOrganizer/songs.txt")
			!=0)){
		$SongArray = file("SongOrganizer/songs.txt");
	switch ($_GET['action']){
		case 'Remove Duplicates' :
		$SongArray = array_unique($SongArray);
		$SongArray = array_values($SongArray);
		break;
		case 'Sort Ascending':
		sort($SongArray);
		break;
		case 'Shuffle':
		shuffle($SongArray);
		break;
	}//end of the switch statement
	if (count($SongArray)>0) {
		$NewSongs = implode($SongArray);
		$SongStore = fopen("SongOrganizer/songs.txt", "wb");
		if ($SongStore === false)
			echo "There was an error updating the song file\n";
		else {
			fwrite($SongStore, $NewSongs);
			fclose($SongStore);
		}
	}
	else
		unlink("SongOrganizer/songs.txt");
	}
}
if (isset($_POST['submit'])){
	$SongToAdd = stripslashes($_POST['SongName']) . "\n";
	$ExistingSongs = array();
	if (file_exists("SongOrganizer/songs.txt")
		&& filesize("SongOrganizer/songs.txt")
		>0) {
		$ExistingSongs = file("SongOrganizer/songs.txt");
	}
	if (in_array($SongToAdd, $ExistingSongs)){
		echo "<p>The song you entered already exists!<br />\n";
		echo "Your song was not added to the list.</p>";
	}
	else {
		$SongFile = fopen("SongOrganizer/songs.txt", "ab");
		if ($SongFile === false)
			echo "There was an error saving your message!\n";
		else {
			fwrite($SongFile, $SongToAdd);
			fclose($SongFile);
			echo "Your song has been added to the list.\n";
		}
	}
	if ((!file_exists("SongOrganizer/songs.txt"))
		|| (filesize("SongOrganizer/songs.txt")
			==0))
		echo "<p>There are no songs in the list.</p>\n";
	else {
		$SongArray = file("SongOrganizer/songs.txt");
		echo "<table border=\ "1\" width=\"100%\" style=\"background-color:lightgray\">\n";
		foreach ($SongArray as $Song){
			echo "<tr>\n";
			echo "<td>" . htmlentities($Song) . "</td>";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

?>
<p>
<a href="SongOrganizer.php?action=Sort%20Ascending">
	Sort Song List</a><br />
<a href="SongOrganizer.php?action=Remove%20Duplicates">
	Remove Duplicate Songs</a><br />
<a href="SongOrganizer.php?action=Shuffle">
	Randomize Song List</a><br />
</p>
<form action="SongOrganizer.php" method="post">
<p>Add A New Song</p>
<p>Song Name: <input type="text" name="SongName" /></p>
<p><input type="submit" name="submit" value="Add Song To List" />
<input type="reset" name="reset" value="Reset Song Name" /></p></form>
</body>
</html>