# Need to create user table for passwords with access level
# then 3 secondary tables using foreign key with 3 types of users? (id as foreignkey)
# since all have different attributes
# do we need same for events?  1 event table?  and then 3 sub events? or all in one db
# event schedule needs to be searchable for conflict (award ceremony cant conflict with competition)
# maybe autograph separate since it Can conflict?
# assuming users registering with email, like last project, but we could add user name if those guys want to build it
# on front end

CREATE DATABASE IF NOT EXISTS SOGSdb;

CREATE TABLE IF NOT EXISTS employee(
    id INT AUTO_INCREMENT,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL, # covers SHA-256
    access VARCHAR(1), # A, E, P? dummy  (Athlete/Employee/PublicUser)
    phone VARCHAR(14),  # how to represent?
    PRIMARY KEY (id)
) ENGINE=InnoDB;   # we need to check if this is default storage engine on XAMP, I was just writing this by hand

CREATE TABLE IF NOT EXISTS publicUser(
    id INT AUTO_INCREMENT,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    access VARCHAR(1), # A, E, P? dummy
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS athlete(
    id INT AUTO_INCREMENT,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    access VARCHAR(1), # A, E, P? dummy
    country VARCHAR(30) NOT NULL,
    height VARCHAR(5) NOT NULL,
    weight INT(3) NOT NULL,  # HOW TO REPRESENT EVENTS? NEED ANOTHER TABLE
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS eventInfo( #event is a reserved word
    id INT AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    date DATE NOT NULL, # dummy (note: had to remove (30) to get to work)
    time  TIME NOT NULL UNIQUE, # dummy   Need to prevent conflict. UNIQUE? Does each event start in 30 minute increments?(note: had to remove (6) to get to work)
    location VARCHAR(30) NOT NULL,
    eventType VARCHAR(15) NOT NULL, #(Competition/award/autograph??)
    category VARCHAR (30) NOT NULL, #(Category of event, Race, Swimming, Bike, etc)
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ticket(
    id INT AUTO_INCREMENT,
    eventName VARCHAR(30) NOT NULL,
    date DATE(30) NOT NULL, # dummy
    time  TIME(6) NOT NULL, # dummy  How to represent?
    location VARCHAR(30) NOT NULL,
    price, CURRENCY(5) NOT NULL,  # Dummy, need currency type
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ticketOrder(
    id INT AUTO_INCREMENT,
    eventName VARCHAR(30) NOT NULL,
    date DATE(30) NOT NULL, # dummy
    time  TIME(6) NOT NULL, # dummy
    location VARCHAR(30) NOT NULL,
    price, CURRENCY(5) NOT NULL,  # Dummy, need currency type,
    purchaseTimeStamp TIMESTAMP(),  #dummy, need data type here
    customerID INT, #  all users need to be represented in single table I think !!!! need unique IDs
    PRIMARY KEY (id)
) ENGINE=InnoDB;

#___________example data inserts for vegetables
INSERT INTO eventinfo (name, date, time, location, eventType, category)
VALUES(
    'test',
    '2017-03-28',
    '12:00:00',
    'NJ',
    'competition',
    'Swimming'
    );
