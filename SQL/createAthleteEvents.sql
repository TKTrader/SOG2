-- Table connects athletes to their events

-- CREATE TABLE IF NOT EXISTS athleteEvent(
--     id INT, # foreign
--     eventID INT, #foreign
--     placement INT(3)  # athlete rank in event
-- ) ENGINE=InnoDB;

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "1",
    "4", # male badminton
    "76"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "1",
    "1", # male archery
    "12"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "2",
    "2", # female archery
    "2"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "2",
    "2", # female diving
    "10"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "2",
    "6", # equestrian
    "1"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "3",
    "2", # female archery
    "1"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "3",
    "2", # female diving
    "3"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "3",
    "6", # equestrian
    "2"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "4",
    "6", # equestrian
    "2"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "4",
    "5", # canoe
    "2"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "5",
    "1", # archer
    "1"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "5",
    "5", # canoe
    "1"
    );
    
INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "5",
    "6", # equestrian
    "9"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "6",
    "1", # archery
    "6"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "6",
    "4", # archery
    "1"
    );

INSERT INTO athleteEvent(athleteID, eventID, placement)
VALUES(
    "6",
    "6", # equestrian
    "6"
    );