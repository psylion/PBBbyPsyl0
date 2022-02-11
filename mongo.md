#mongo md file to help me remember the query I have to do

##
Search with regex:

    { <field>: { $regex: 'pattern', $options: '<options>' } }
Search in Atlas for specific date
    
        { time: /^2022-02-11/}

    db.users.insert({name: 'paulo'})
    db.users.insert({name: 'patric'})
    db.users.insert({name: 'pedro'})

Therefore:
For:

    db.users.find({name: /a/})  // Like '%a%'
Output: paulo, patric

For:

    db.users.find({name: /^pa/}) // Like 'pa%'
Output: paulo, patric

For:

    db.users.find({name: /ro$/}) //like '%ro'
Output: pedro



