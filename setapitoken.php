<?php
/**
* Test Flight Set API Token
* Handles API Token setting plist
* @author Dave Fisher <david.fisher@thevirtualforge.com>
* @version 1.1
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$id = $argv[1];
$w->set('api-token', $id, 'preflight.plist');
echo $id;
