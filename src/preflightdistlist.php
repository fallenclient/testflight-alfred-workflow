<?php
/**
* Pre Flight Distribution List
* @author Dave Fisher <david.fisher@thevirtualforge.com>
* @version 1.1
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$stored_distlist = $w->get('default-distlist', 'preflight.plist');
$q = $argv[1];

$w->result(
	'',
	$q,
	"Set Distribution List to '$q'",
	'Enter Distribution List',
	'icon.png',
	'yes'
	);

$w->result(
	'',
	"0",
	"Set Default Empty Distribution List",
	'',
	'icon.png',
	'yes'
	);

if (strLen($stored_distlist) > 0 and $stored_distlist != "0")
{
$w->result(
	'',
	$stored_note,
	"Set Distribution List to previous '$stored_distlist'",
	'Use last Build Distribution List',
	'icon.png',
	'yes'
	);
}

echo $w->toxml();
