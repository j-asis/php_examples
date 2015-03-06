<?php
$db = new mysqli("localhost", "root", 'nvTM$ql3', "phpexample");
// make sure the above credentials are correct for your environment
if ($db->connect_error) {
die("Connect Error ({$db->connect_errno}) {$db->connect_error}");
}
$sql = "SELECT * FROM sample";
$result = $db->query($sql);
?>
<html>
<body>
<table cellSpacing="2" cellPadding="6" align="center" border="1">
<tr>
<td colspan="4">
<h3 align="center">These are some list of people</h3>
</td>
</tr>
<tr>
<td align="center">Name</td>
<td align="center">City</td>
<td align="center">Number</td>
</tr>
<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
<td><?php echo stripslashes($row['name']); ?></td>
<td align="center"><?php echo $row['address']; ?></td>
<td><?php echo $row['telephone']; ?></td>
</tr>
<?php } ?>
</table>
</body>
</html>
