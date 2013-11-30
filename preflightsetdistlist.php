<?php
/**
* Pre Flight Set Distribution List
* Handles Distribution List setting plist
* @author Dave Fisher <david.fisher@thevirtualforge.com>
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$id = $argv[1];
$w->set('default-distlist', $id, 'preflight.plist');
echo $id;
