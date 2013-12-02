<?php
/**
* Pre Flight Notify
* @author Dave Fisher <david.fisher@thevirtualforge.com>
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$q = $argv[1];

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
