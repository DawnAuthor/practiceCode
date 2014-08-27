<?php



$num1 = 3;
$num2 = 0;
try{
	$model = new Model();
}catch(Exception $e){
	echo 'Caught Exception: ', $e->getMessage(), "\n", $e->getFile(), "\n", $e->getLine(), "\n";
}