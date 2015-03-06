<?php

$name = 'Tim O\'Reilly';// escaped single quote
echo $name . "<br>";
$path = 'C:\\WINDOWS'; // escaped backslash
echo $path . "<br>";
$nope = '\n';
// not an escape
echo $nope . "<br><br>";

//printf
printf(<<< Template
%s is %d years old.
Template
, "Fred", 35);
echo "<br><br>";

// this part is about the heredoc that starts with <<<
$dialogue = <<< NoMore
"It's not going to happen!" she fumed.
He raised an eyebrow. "Want to bet?"
NoMore;
echo $dialogue;



?>