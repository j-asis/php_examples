<?php 
function updateCounter()
{
global $counter;
$counter++;
}
$counter = 10;
updateCounter();
echo $counter;

echo "<br><br>";

function updateCounter2(){
    @$counter++; // use @ to suppress error
}
//reset values
$counter = 10;
updateCounter2();
echo $counter;

echo "<br><br>";


?>