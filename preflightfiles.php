<?php
/**
* Pre Flight Files
* Handles the ipa & zip file submission
* @author Dave Fisher <david.fisher@thevirtualforge.com>
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');
$q = $argv[1];

// Tab Split Incomming Args
$files = explode("\t", $q);
// How many files?
if (count($files) > 1)
{
	// Multiple files - Need to check they are valid
	$firstExt = getFileExtension($files[0]);
	$secondExt = getFileExtension($files[1]);
	$fileCheck = verifyExtension($firstExt, $secondExt);
}else{
	// Single file - Need to check its valid
	$firstExt = getFileExtension($files[0]);
	$fileCheck = verifyExtension($firstExt);
	// Set any previously set dSym to Empty
	$w->set('file-zip', '', 'preflight.plist');
}

if ($fileCheck)
{
	if ($firstExt == "ipa")
	{
		$w->set('file-ipa', $files[0], 'preflight.plist');	
	}else{
		$w->set('file-zip', $files[0], 'preflight.plist');
	}

	if ($secondExt == "ipa")
	{
		$w->set('file-ipa', $files[1], 'preflight.plist');	
	}else{
		$w->set('file-zip', $files[1], 'preflight.plist');
	}
	
	echo '1';
}else{
	// Incorrect File
	// Return String 0 for Output Apple Script
	echo '0';
}

/**
* Get File Extension
* @return String $ext last three letters of a string
*/
function getFileExtension($str){
	$strLen = strLen($str);
	$ext = substr($str, $strLen - 3, 3);
	return $ext;
}

/**
* Verify Extension
* Verify that each file has the correct extension
* @return Bool
*
*/
function verifyExtension($extOne, $extTwo = null){
	if ($extTwo === null)
	{
		if ($extOne == "ipa")
		{
			return true;
		}
	}else{
		if (($extOne == "ipa" or $extOne == "zip") and ($extTwo == "zip" or $extTwo == "ipa"))
		{
			return true;
		}
	}
	return false;
}