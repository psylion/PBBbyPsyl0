# History log 
#### Log actions and status feedback during development 
*(Record New log on top)*

### Ideas/Improvements
- index page switch from latest50 trax to search by:
  - free-text
  - artist
  - title
  - ... 
- 2025 Dec
  - No More PBB from.... 
  - Idea to select another online radio and keep listen trace log
  - Somafm have a different output: https://api.somafm.com/channels.json
  - Found on https://github.com/intergalacticfm/online-radio-channels
  - .. .could be useful for future dev

## 24 Nov 2022: Removed MongoDB CLuster0 and Project PBBbyPsylo
- Renamed PPBtest by PBBbyPsylo after removing obsolete cluster/project
  - Chart was sill active, i was unable to remove delete the project
  - Chart delete option not enough
  - other option had to be selected from Project Setting
- No change in the connection - Update of new tracks continue to be written

## 21 Jul 2022: some of the original title from PBB does not contain ' _ '
- this will cause the current logic to be wrongly interpreted
- title logged into AtlasMongoDB contain the LABEL
- Looking at the latest changes I discovered that sometime there are no 'space underscore space' in the sequence
- Must change the regular expression to match all HIGH CAPS from the end of string
- this should be solved with the following regex sequence:

  `
/([A-Z*\s]*\w)$/
`
 
## 28 Jun 2022: restored PBBbyPsyl0 after crash of Raspberry SDCard
- Missing latest changes (Full MongoDB storage and many more changes)
- Only Github changes has been restored
- more to log...

## 01 May 2021: new pages and more
- In the latest 2 days I've been looking to adapt the project to display tracks.
- I also added Bootstrap for nice display
- getJson.html page is the first page which refresh dynamically and list the latest 10 tracks in reverse order.

## 28 Apr 2021: a lot of updates
- call extractEle from ajax to split title and record into json file
- issue with raspberry.local not recognised see article [on raspBerry forum](https://raspberrypi.stackexchange.com/questions/7640/raspberry-pi-not-reachable-via-its-hostname-in-lan)
  - insserv was not available I used the following.
`sudo systemctl enable name_of_your_legacy_sysv_service`
  - this was solving my issue.
- need to debug the json file creation: no content saved
- @1200: I have a working code which logs in JSON changed tracks
  - debug output need to be removed
  - small issue with information containing underscore in the track title

## 27 Apr 2021: test.php 
is the current working page, with the title.php which is currently using the pbbstream.php from Kdbuz. Unfortunately I'm not able to request HTTPS with php from my PI4 Nginx webserver
