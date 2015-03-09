<html>
<head><title>Temperature Conversion</title></head>
<body>
<?php 
if (!isset($_GET['fahrenheit'])) {  ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
Fahrenheit temperature:
<input type="text" name="fahrenheit" /><br />
<input type="submit" value="Convert to Celsius!" />
</form>
<?php }
else {
$fahrenheit = $_GET['fahrenheit'];
$celsius = ($fahrenheit - 32) * 5 / 9;
printf("%.2fF is %.2fC", $fahrenheit, $celsius);
} ?>
</body>
</html>
