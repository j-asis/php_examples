<?php
$tz = ini_get('date.timezone');
$dtz = new DateTimeZone($tz);
echo "Server's Time Zone: {$tz} <br/>";
foreach ($dtz->getLocation() as $key => $value) {
echo "{$key} {$value}<br/>";
}
?>