<?php
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$q = $argv[1];
// Testing appears but need to sort out strlen
$w->result(
	'',
	"True",
	"Set Notify to True",
	'Notifies users to install new build',
	'icon.png',
	'yes'
	);
$w->result(
	'',
	"False",
	"Set Notify to False",
	'Dont notify Users of new build',
	'icon.png',
	'yes'
	);
echo $w->toxml();