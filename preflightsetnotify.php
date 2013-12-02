<?php
/**
* Pre Flight Set Notify
* Handles Notify setting plist
* @author Dave Fisher <david.fisher@thevirtualforge.com>
* @version 1.1
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$id = $argv[1];

$w->set('default-notify', $id, 'preflight.plist');

echo $id;
