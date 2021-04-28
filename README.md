# PBBbyPsyl0
PBB is a web radio made by [Laurent GARNIER](https://www.laurentgarnier.com/), you can get more information from [wikipedia](https://en.wikipedia.org/wiki/Laurent_Garnier) or on different social media: (FB, Tweeter, Instagram).

The Web radio is called PBB, aka *Pedro Broadcasting Basement*. You can tune in via the following link https://pbbradio.com:8443/128. There are a few internet wrapper which can get you on the stream, but the coolest is the one from [Kdbuzz](https://www.kdbuzz.com/PBB) which provide you with the current track details.

I've received the php code to extract those information, and I'm planning to create a way to store a log of all tracks played... and maybe produce some stats and search features...

## 27 Apr 2021: test.php 
is the current working page, with the title.php which is currently using the pbbstream.php from Kdbuz. Unfortunately I'm not able to request HTTPS with php from my PI4 Nginx webserver

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