<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Register Bowler</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
<?php
/*$Dir = "bowlers";
if (is_dir($Dir)){
	if (isset($_POST['save'])){
		if(empty($_POST['name']))
			echo "Please fill in your name.\n";
		else
		($_POST['name']) . "\n";
		($_POST['age']) . "\n";
		($_POST['average']) . "\n";

	}
}*/
if (empty($_POST['first_name']))
echo "<p>You must enter your first and last name. Click your browser's Back button to return to the Guest Book.</p>\n";
else{
	$name = addslashes($_POST['name']);
	$age = addslashes($_POST['age']);
	$average = addslashes($_POST['average']);
	$GuestBook = fopen("guestbook.txt", "ab");
	if (is_writeable("guestbook.txt")){
		if (fwrite($GuestBook, $LastName . ", " . $FirstName . "\n"))
			echo "<p>Thank you for signing our guest book!</p>\n";
		else
			echo "<p>Cannot add your name to the guest book.</p>\n";
	}
	else
		echo "<p>Cannot write to the file.</p>\n";
	fclose($GuestBook);
}
?>
<h2>Enter Your Information Below To Register For The Tournament</h2>
<form action="RegisterBowler.php" method="POST">
Your Name: <input type="text" name="name" /><br />
Your Age: <input type="text" name="age" /><br />
Your Average: <input type="text" name="average" /><br />
<input type="submit" name="save" value="Register" /><br />
</form>
</body>
</html>
