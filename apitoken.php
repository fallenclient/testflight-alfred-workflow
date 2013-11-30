<?php
/**
* Test Flight API Token
* @author Dave Fisher <david.fisher@thevirtualforge.com>
* @version 1.1
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$q = $argv[1];
$w->result(
	'',
	$q,
	"Set API Token to '$q'",
	'Enter a valid API Token',
	'icon.png',
	'yes'
	);
echo $w->toxml();
