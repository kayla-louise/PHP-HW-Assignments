<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Show Guest Book</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
<?php
echo "<pre>";
readfile("guestbook.txt");
echo "</pre>";
/*$Guests = file("guestbook.txt");
for ($i=0; $i<count($Guests); ++$i){
	$GuestBookNames = explode(", ", $Guests[$i]);
	echo "{$GuestBookNames}<br />\n";
}
readfile("guestbook.txt"); */
?>
</body>
</html>