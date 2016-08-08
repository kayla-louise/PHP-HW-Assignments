<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PHP Code Blocks</title>
<meta http-equiv="content-type"
    content="text/html ; charset=iso-8859-1" />
</head>
<body>
<p>
<?php
echo "This text is displayed using standard PHP
script delimiters. ";
?>
</p>
<p>
<script language="php">
echo "This text is displayed using a PHP script section.";
</script>
</p>
<p>
<?
echo "This text is displayed using short PHP script delimiters.";
?>
</p>
<p>
<%
echo "This text is displayed using ASP-style script delimiters.";
%>
</p>
</body>
</html>