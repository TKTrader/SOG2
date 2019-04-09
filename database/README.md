# SOG2
files should be entered in PHPadmin in roughly the following order (to account for foreign keys/child tables):

dbCreate                Creates overall database
createUsers
createAthletes          child table of users
createOlympicEvents 
createAthleteEvents     child table of Athletes and OlympicEvents
createTicketOrder       child table of users and OlympicEvents

I assume a full order for cart will be calculated from createTicketOrder rather than having a separate cart table
