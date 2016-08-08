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
if (empty($_POST['first_name']) || empty($_POST['last_name']))
echo "<p>You must enter your first and last name. Click your browser's Back button to return to the Guest Book.</p>\n";
else{
	$FirstName = addslashes($_POST['first_name']);
	$LastName = addslashes($_POST['last_name']);
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
</body>
</html>