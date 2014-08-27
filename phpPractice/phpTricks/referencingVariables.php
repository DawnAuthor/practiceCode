<?php

function lowercase(&$string){
	$string = strtolower($string);
}

$name = "STEPHEN";

lowercase($name);
echo $name;