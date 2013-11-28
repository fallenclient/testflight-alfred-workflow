<?php
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$q = $argv[1];
// Testing appears but need to sort out strlen
$w->result(
	'',
	"True",
	"Set Replace to True",
	'Replace binary for an existing build if one is found with the same name/bundle version',
	'icon.png',
	'yes'
	);
$w->result(
	'',
	"False",
	"Set Replace to False",
	'Replace binary for an existing build if one is found with the same name/bundle version',
	'icon.png',
	'yes'
	);
echo $w->toxml();