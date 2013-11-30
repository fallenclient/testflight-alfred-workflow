<?php
/**
* Test Flight Set Team Token
* Handles Team Token setting plist
* @author Dave Fisher <david.fisher@thevirtualforge.com>
* @version 1.1
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$id = $argv[1];
$w->set('team-token', $id, 'preflight.plist');
echo $id;
