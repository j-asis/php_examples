<?php
function countList()
{
    if (func_num_args() == 0) {
    return false;
}
else
{
    $count = 0;
    for ($i = 0; $i < func_num_args(); $i++) {
    $count += func_get_arg($i);
    }
return $count;
}
}


echo countList(1, 5, 9); // outputs "15"

?>