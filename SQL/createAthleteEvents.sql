-- Table connects athletes to their events

-- CREATE TABLE IF NOT EXISTS athleteEvent(
--     id INT, # foreign
--     eventID INT, #foreign
--     placement INT(3)  # athlete rank in event
-- ) ENGINE=InnoDB;

INSERT INTO SOGSdb.athletes(id, country, height, wgt, DOB)
VALUES(
    "1",
    "Venezuela",
    concat('5',char(39),'11',char(34)),
    "165.3",
    "1998-06-30"
    );

