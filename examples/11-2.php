<?php
//trigger_error("ayaw ko",E_USER_ERROR);
$ar = array('0'=>0,'NULL'=>NULL,'false'=>false,'""'=>'','1'=>1);
foreach ($ar as $key=>$val) {
    echo $key . " = ";
    if(isset($val)){ echo "yes"; }
    else {echo "no";}
    echo "<br>";
}
?>