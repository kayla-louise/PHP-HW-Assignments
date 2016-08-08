<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JumbleMaker</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
<?php
function displayError($fieldName, $errorMsg) {
	global $errorCount;
	echo "Error for \"$fieldName\": $errorMsg<br />\n";
	++$errorCount;
}

function validateWord($data, $fieldName) {
	global $errorCount;
	if (empty($data)){
		displayError ($fieldName, "This field is required");
		$retval = "";
	}
	else { //only clean up the input if it isn't empty
	$retval = trim($data);
	$retval = stripslashes($retval);
	if ((strlen($retval)<4) ||
		(strlen($retval)>7)){
		displayError($fieldName, "Words must be at least four and at most seven letters long");
	}
	if (preg_match("/^[a-z]+$/i", $retval)==0){
		displayError($fieldName, "Words must be only letters");
	}
	}
	$retval = strtoupper($retval);
	$retval = str_shuffle($retval);
	return($retval);
}
$errorCount = 0;
$words = array();
$words[] = validateWord($_POST['Word1'], "Word 1");
$words[] = validateWord($_POST['Word2'], "Word 2");
$words[] = validateWord($_POST['Word3'], "Word 3");
$words[] = validateWord($_POST['Word4'], "Word 4");

if ($errorCount>0)
	echo "Please use the \"Back\" button to re-enter the data.<br />\n";
else {
	$wordnum = 0;
	foreach ($words as $word)
		echo "Word" .++$wordnum.": $word<br />\n";
}
?>
</body>
</html>