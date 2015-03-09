<?php
/*
NOTE (BUG): 
The Code in the book is buggy. I will always return true because
it will treat the array as defined even if it is empty bacause
it will always be declared.

FIX : edited the hasRequired function

*/


function hasRequired($array, $requiredFields){
    foreach($requiredFields as $value){
        if(empty($array[$value])){
            return false;
        }
    }
    return true;
}



if (isset($_POST['submitted'])) {
    echo "<p>You ";
    echo hasRequired($_POST, array('name', 'email_address')) ? "did" : "did not";
    echo " have all the required fields.</p>";
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<p>Name: <input type="text" name="name" /><br />
Email address: <input type="text" name="email_address" /><br />
Age (optional): <input type="text" name="age" /></p>
<p align="center"><input type="submit" value="submit" name="submitted" /></p>
</form>
