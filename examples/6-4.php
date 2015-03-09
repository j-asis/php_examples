<?php
include_once "6-3.php";
session_start();
session_destroy();
session_start();
?>
<html><head><title>Front Page</title></head>
<body>
<?php
    $now = strftime("%c");
    if (!isset($_SESSION['l'])) { // causing deprecated error, used this instead
        $logger = new Log("/tmp/persistent_log");
        $_SESSION['l'] = ''; // causing deprecated error, used this instead
        $logger->write("Created $now");
        echo("<p>Created session and persistent log object.</p>");
    }
    $logger->write("Viewed first page {$now}");
    echo "<p>The log contains:</p>";
    echo nl2br($logger->read());
?>
<a href="next.php">Move to the next page</a>
</body></html>

