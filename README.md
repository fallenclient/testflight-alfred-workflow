testflight-alfred-workflow
==========================

A workflow for uploading builds to TestFlight from Alfred.

Getting Started
Get started by adding your API Token and Team Token to the workflow using keywords tfapitoken and tfteamtoken.
With your ipa file and dSym zip file (optional) selected use the hotkey CTRL+SHIFT+B to start the workflow.

The workflow will take you through adding notes, distribution list (optional), notify users of build (optional, defaults to false) and replace build of the same name (optional, defaults to false) in that order. Final step Test Flight Upload will switch from Upload Waiting… to the install url of the build or will notify on complete if you hit return/switch focus.

Notes
Once you have been through the workflow once using the keyword tfupload will start a new upload with previously entered options and the previously selected files.
You can also hit any keyword in the chain (tfpreflightnotes, tfdistribution, tfnotify, tfreplace) to start the workflow at that point using any previous options. e.g. tfdistribution will use the same selected files and notes as entered previously but will allow you to set distribution, notify and replace before uploading.
