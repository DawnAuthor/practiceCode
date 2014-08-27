<?php



function potatoArray(&$array){
	$array[] = 'potato';
}

$nonpotato = array(
	'john',
	'andew',
	'cheese'
);

potatoArray($nonpotato);

print_r($nonpotato);