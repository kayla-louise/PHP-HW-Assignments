<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Paycheck</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
<?php
global $hoursWorked;
global $hourlyWage;
global $payCheckAmt;

	function calcPaycheck{
		
		if ($hoursWorked <=40){
			($payCheckAmt=$hoursWorked * $hourlyWage);
			echo "Your paycheck amount is $", $payCheckAmt;
		}
		else {($payCheckAmt=(($hoursWorked*$hourlyWage)+(($hoursWorked-40)*$hourlyWage)*1.5);
			echo "Your paycheck amount is $", $payCheckAmt;
	}

?>
</body>
</html>