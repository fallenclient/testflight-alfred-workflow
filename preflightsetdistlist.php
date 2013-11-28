<?php
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$id = $argv[1];
$w->set('default-distlist', $id, 'preflight.plist');
echo $id;