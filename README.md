# PBBbyPsyl0
PBB is a web radio made by [Laurent GARNIER](https://www.laurentgarnier.com/), you can get more information from [wikipedia](https://en.wikipedia.org/wiki/Laurent_Garnier) or on different social media: (FB, Tweeter, Instagram).

The Web radio is called PBB, aka *Pedro Broadcasting Basement*. You can tune in via the following link https://pbbradio.com:8443/128. There are a few internet wrapper which can get you on the stream, but the coolest is the one from [Kdbuzz](https://www.kdbuzz.com/PBB) which provide you with the current track details.

I've received the php code to extract those information, and I'm planning to create a way to store a log of all tracks played... and maybe produce some stats and search features...

### TODO List:
- edit JSON for errors  ::Completed
- remove debug console output ::Almost Completed
- add JSON filename with days to limit the file to 24hours ::Completed

### References
- [History Log](historylog.md)

### Create JSON from Google sheet
- I extracted all the Genre tags from PBB
- Community help me to create the definition of the abbreviated tags - Thanks to Bruno Ferrari!
- Link to convert with Google API script editor http://blog.pamelafox.org/2013/06/exporting-google-spreadsheet-as-json.html
- TODO next :: Load the genre and make a display of the definition
