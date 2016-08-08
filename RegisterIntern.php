<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Intern Registration</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
	<h1>College Internships</h1>
	<h2>Intern Registration</h2>
	<?php
	$errors = 0;
	$email = "";
	if (empty($_Post['email'])) {
		++$errors;
		echo "<p>You need to enter an e-mail address.</p>\n";
	}
	else {
		$email = stripslashes($_POST['email']);
		if (preg_match("/^[\w-]+(\.[w-]+)*@" . "[\w-]+(\.[\w-]+)*(\.[a-zA-Z]{2, })$/i", $email) == 0) {
			++$errors;
			echo "<p>You need to enter a valid " . "e-mail address.</p>\n";
			$email = "";
		}
	}
	?>
</body>
</html>