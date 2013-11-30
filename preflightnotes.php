<?php
/**
* Pre Flight Notes
* @author Dave Fisher <david.fisher@thevirtualforge.com>
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$stored_note = $w->get('default-note', 'preflight.plist');
$q = $argv[1];

$w->result(
	'',
	$q,
	"Set Notes to '$q'",
	'Enter Build Notes',
	'icon.png',
	'yes'
	);
if(strLen($stored_note) > 0){
$w->result(
	'',
	$stored_note,
	"Set Notes to previous '$stored_note'",
	'Use last Build Notes',
	'icon.png',
	'yes'
	);
}
echo $w->toxml();
