<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>European Travel</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
<?php
$Distances = array(
	"Berlin" => array(
		"Berlin" => 0,
		"Moscow" => 1607.99,
		"Paris" => 876.96,
		"Prague" => 280.34,
		"Rome" => 1181.67
		),
	"Moscow" => array(
		"Berlin" => 1607.99,
		"Moscow" => 0,
		"Paris" => 2484.92,
		"Prague" => 1664.04,
		"Rome" => 2374.26
		),
	"Paris" => array(
		"Berlin" => 876.96,
		"Moscow" => 641.31,
		"Paris" => 0,
		"Prague" => 885.38,
		"Rome" => 1105.76
		),
	"Prague" => array(
		"Berlin" => 280.34,
		"Moscow" => 1664.04,
		"Paris" => 885.38,
		"Prague" => 0,
		"Rome" => 922
		),
	"Rome" => array(
		"Berlin" => 1181.67,
		"Moscow" => 2374.26,
		"Paris" => 1105.76,
		"Prague" => 922,
		"Rome" => 0
		)
	);
$StartIndex = "";
$EndIndex = "";
$KMtoMiles = 0.62;
if (isset($_POST['submit'])){
	$StartIndex = stripslashes($_POST['Start']);
	$EndIndex = stripslashes($_POST['End']);
	if (isset(
		$Distances[$StartIndex][$EndIndex]))
		echo "<p>The distance from $StartIndex to $EndIndex is " . 
	$Distances[$StartIndex][$EndIndex]. "kilometers, or " . round(
		($KMtoMiles * $Distances[$StartIndex][$EndIndex]),2) . "miles.</p>\n";
	else
		echo "<p>The distance from $StartIndex to $EndIndex is not in the array.</p>\n";
}
?>
<form action="EuropeanTravel.php" method="post">
<p>Starting City:
<select name="Start">
	<?php
	foreach ($Distances as $City => $OtherCities){
		echo "<option value='$City'";
		if (strcmp($StartIndex, $City)===0)
			echo "selected";
		echo ">$City</option>\n";
	}
	?>
</select></p>
<p>Ending City:
<select name="End">
	<?php
	foreach ($Distances as $City => $OtherCities){
		echo "<option value='$City'";
		if (strcmp($EndIndex, $City)===0)
			echo "selected";
		echo ">$City</option>\n";
	}
	?>
</select></p>
<p><input type="submit" name="submit" value="Calculate Distance" /></p></form>
</body>
</html>