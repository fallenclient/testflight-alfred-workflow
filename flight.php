<?php
/**
* Flight
* Constructs request to Test Flight API
* @author Dave Fisher <david.fisher@thevirtualforge.com>
* @version 1.1
*/
require_once('workflows.php');
$w = new Workflows('davefisher.tf');

// Call Data from PLIST
$api_token = $w->get('api-token', 'preflight.plist');
$team_token = $w->get('team-token', 'preflight.plist');
$file_ipa = $w->get('file-ipa', 'preflight.plist');
$file_zip = $w->get('file-zip', 'preflight.plist');
$note = $w->get('default-note', 'preflight.plist');
$dist_list = $w->get('default-distlist', 'preflight.plist');
$notify = $w->get('default-notify', 'preflight.plist');
$replace = $w->get('default-replace', 'preflight.plist');
// Validate
// No API or Team Token
if (($api_token === null or strLen($api_token) < 1) or ($team_token === null or strLen($team_token) < 1))
{
	$w->result(
	'',
	'Error: Missing API Token or Team Token',
	"Error",
	'You must supply api_token and team_token.',
	'icon.png',
	'yes'
	);
	echo $w->toxml();
	return;
}

if ($file_ipa === null or strLen($file_ipa) < 1)
{
	$w->result(
	'',
	'Error: IPA File Required!',
	"Error",
	'You must supply a valid IPA file.',
	'icon.png',
	'yes'
	);
	echo $w->toxml();
	return;
}

if ($note === null or strLen($note) < 1)
{
	$w->result(
	'',
	'Error: Build Note is Required!',
	"Error",
	'You must supply a build note.',
	'icon.png',
	'yes'
	);
	echo $w->toxml();
	return;
}
// CURL POST ARGS
$post = array(
	"file" => "@".$file_ipa,
	"api_token" => $api_token,
	"team_token" => $team_token,
	"notes" => $note
	);

if ($file_zip != null or strLen($file_zip) > 0)
{
	$post["dsym"] = "@".$file_zip;
}

if ($dist_list != null or strLen($dist_list))
{
	$post["distribution_lists"] = $dist_list;
}

$post["notify"] = filter_var($notify, FILTER_VALIDATE_BOOLEAN);
$post["replace"] = filter_var($replace, FILTER_VALIDATE_BOOLEAN);
// CURL OPTIONS
$options = array(
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => $post
	);
// REQUEST - HANDLE RESPONSE
$result = $w->request('http://testflightapp.com/api/builds.xml', $options);
if ($result == "You must supply api_token, team_token, the file and notes (missing notes)")
{
	$w->result(
	'',
	'Error: API responded missing notes!',
	"Error",
	'You must supply api_token, team_token, the file and notes (missing notes)',
	'icon.png',
	'yes'
	);
}else if ($result == "You must supply api_token, team_token, the file and notes (missing file)")
{
	$w->result(
	'',
	'Error: API responded missing file!',
	"Error",
	'You must supply api_token, team_token, the file and notes (missing file)',
	'icon.png',
	'yes'
	);
}else
{
	$result_xml = new SimpleXMLElement($result);
	$w->result(
		'',
		$result_xml->install_url,
		'Upload Success',
		'Install URL '.$result_xml->install_url,
		'icon.png',
		'yes'
		);
}
echo $w->toxml();

/*curl http://testflightapp.com/api/builds.json 
    -F file=@testflightapp.ipa
    -F dsym=@testflightapp.app.dSYM.zip
    -F api_token='your_api_token' 
    -F team_token='your_team_token' 
    -F notes='This build was uploaded via the upload API' 
    -F notify=True 
    -F distribution_lists='Internal, QA'*/
