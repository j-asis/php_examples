<?php
include_once "6-3.php";
session_start();
session_destroy();
session_start();

?>
<html><head><title>Next Page</title></head>
<body>
<?php
$logger = new log("/tmp/persistent_log"); // add this to make it work
$now = strftime("%c");
$logger->write("Viewed page 2 at {$now}");
echo "<p>The log contains:";
echo nl2br($logger->read());
echo "</p>";
session_destroy();
?>
</body></html>
