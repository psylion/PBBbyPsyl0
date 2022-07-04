#mongo md file to help me remember the query I have to do
## Log new search in Atlas web UI
search for empty title with label = xx

`{title:  {"$exists" : true, "$eq" : ""}, label : "MR BONGO"}`

Search with regex:

`{ <field>: { $regex: 'pattern', $options: '<options>' } }`

Search in Atlas for specific date

`{ time: /^2022-02-11/}`

## Code for search
If you have some insertion like the following:
`db.users.insert({name: 'paulo'})
db.users.insert({name: 'patric'})
db.users.insert({name: 'pedro'})`

Therefore:
For:

`db.users.find({name: /a/})  // Like '%a%'
Output: paulo, patric`

For:

`db.users.find({name: /^pa/}) // Like 'pa%'
Output: paulo, patric`

For:

`db.users.find({name: /ro$/}) //like '%ro'
Output: pedro`



