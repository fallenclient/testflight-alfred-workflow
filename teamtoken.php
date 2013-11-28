<?php
/**
* Script Filter for Test Flight Team Token
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$q = $argv[1];
$w->result(
	'',
	$q,
	"Set Team Token to '$q'",
	'Enter a valid Team Token',
	'icon.png',
	'yes'
	);
echo $w->toxml();