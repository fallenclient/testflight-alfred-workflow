Testflight Alfred Workflow
==========================

A workflow for uploading builds to TestFlight from Alfred.

![Test Flight Workflow Options](http://fallenclient.github.io/testflight-alfred-workflow/images/all-options.jpg "Options")

Getting Started
===============
This workflow can be triggered by hotkey keyboard shortcut with the ipa/dSym zip selected in a Finder window or by navigating to a ipa (with or without dSym zip) via the Alfred file browser. 

On a new install you need to set the hotkey to a key combination you want to use. You can do this by installing the workflow, going to Alfred preferences, Workflows, select TestFlight v1.2 from the left hand bar and double clicking the first item on the left "Hotkey". In the popup click the Hotkey: box and press the keys on the keyboard you would like to use. The next step is adding your API Token and Team Token to the workflow using keywords tfapitoken and tfteamtoken.

When triggered the workflow will take you through adding notes, distribution list (optional), notify users of build (optional, defaults to false) and replace build of the same name (optional, defaults to false) in that order. Final step Test Flight Upload once return is hit will upload your file(s) in the background and will notify you on success or failure. A successfull upload will put the build link on your clipboard to paste.

Notes
=====
**Once you have been through the workflow once using the keyword tfupload will start a new upload with previously entered options and the previously selected files. You can also hit any keyword in the chain (tfpreflightnotes, tfdistribution, tfnotify, tfreplace) to start the workflow at that point using any previous options. e.g. tfdistribution will use the same selected files and notes as entered previously but will allow you to set distribution, notify and replace before uploading.**

Credits
=======
jdfwarrior - Awesome PHP Workflow For Alfred - http://dferg.us/

Change Log
----------
Version 1.2
* Workflow can now be triggered by Alfred File Action

Version 1.1
* Added Copy to Clipboard
* Hitting return on tfupload continues execution
