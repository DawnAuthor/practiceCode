<?php

$File = "test.txt";

$Handle = fopen($File, 'w');

$Data = "John Doe\n";

fwrite($Handle, $Data);

$Data = "Bilbo Jones\n";

fwrite($Handle, $Data);

print "Data Written";
print end(explode('/',$_SERVER['PHP_SELF']));
fclose($Handle);

?>