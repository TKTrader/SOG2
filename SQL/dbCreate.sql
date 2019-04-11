# Constraints on data can be added to INSERT statements,
# otherwise in table itself, only on numeric values or length of string
# https://mariadb.com/kb/en/library/constraint/

# To do:

# may need to add ON UPDATE CASCADE  etc clauses to some foreign keys so they update with other tables
# example:  delete athlete should also delete athleteEvents where athlete is participating
# example 2:  we delete an athlete in users table;  also should cascade so child row is deleted in athletes table

CREATE DATABASE IF NOT EXISTS SOGS;

CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    access VARCHAR(1) DEFAULT 'P', # A:Athlete, Employee:E, PublicUser:P
    phone VARCHAR(24),
    PRIMARY KEY (id)
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS athletes(
    id INT,
    country VARCHAR(30) NOT NULL,
    height VARCHAR(5) NOT NULL,
    wgt FLOAT(4,1) NOT NULL,
    DOB DATE, # YYYY-MM-DD
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS olympicEvent( #removed all the evt
    id INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    time  TIME NOT NULL,
    location VARCHAR(30) NOT NULL,
    type VARCHAR(5) NOT NULL, #(comp/award/autog),
    -- check(type in ('comp', 'award', 'autog')),
    category VARCHAR(30) NOT NULL, # archery, etc
    ticketPrice DECIMAL(5,2),
    PRIMARY KEY (id)
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS updatedEvent( #removed all the evt
    id INT AUTO_INCREMENT,
    olympicEventID INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    time  TIME NOT NULL,
    location VARCHAR(30) NOT NULL,
    type VARCHAR(5) NOT NULL, #(comp/award/autog),
    -- check(type in ('comp', 'award', 'autog')),
    category VARCHAR(30) NOT NULL, # archery, etc
    ticketPrice DECIMAL(5,2),
    PRIMARY KEY (id),
    FOREIGN KEY (olympicEventID) REFERENCES olympicEvent(id) ON DELETE CASCADE
) ENGINE=InnoDB;

# table to match athletes to their events
CREATE TABLE IF NOT EXISTS athleteEvent(
    id INT AUTO_INCREMENT,
    athleteID INT NOT NULL, # foreign key
    eventID INT NOT NULL, #foreign key
    placement INT(3),  # athlete rank in event
    PRIMARY KEY (id),
    FOREIGN KEY (athleteID) REFERENCES athletes(id) ON DELETE CASCADE,
    FOREIGN KEY (eventID) REFERENCES olympicEvent(id) ON DELETE CASCADE
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# actual tickets purchased.  Do we need column for total or calculate separately?
# do we need foreign key here?
CREATE TABLE IF NOT EXISTS ticketOrder(
    id INT AUTO_INCREMENT,
    eventID VARCHAR(30) NOT NULL, # from events table,
    numTickets INT NOT NULL,
    ticketPrice DECIMAL(5,2) NOT NULL, # from events table
    orderTimeStamp TIMESTAMP NOT NULL,
    customerID INT NOT NULL, # from users table
    PRIMARY KEY (id)
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS eventList(
    name VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    id INT AUTO_INCREMENT,
    PRIMARY KEY (id)
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

// categoryList not working; primary key had to be id, since auto-incremented
#Reason for category being first is so the lest is alphabetically organized instead of numerically
CREATE TABLE IF NOT EXISTS categoryList(
    category VARCHAR(50) NOT NULL UNIQUE,
    id INT AUTO_INCREMENT,
    PRIMARY KEY (id)
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS typeList(
    type VARCHAR(5) NOT NULL, #(comp/award/autog),
    id INT AUTO_INCREMENT,
    PRIMARY KEY (id)
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS arenaList(
  name VARCHAR(15) NOT NULL, #Arena1, Arena2, Arena3
  id INT AUTO_INCREMENT,
  PRIMARY KEY (id)
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS eventList2(
    name VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    id INT AUTO_INCREMENT,
    PRIMARY KEY (id)
) ENGINE=InnoDB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

--https://dba.stackexchange.com/questions/76788/create-a-mysql-database-with-charset-utf-8




-- # Fields done, needs foreign key
-- CREATE TABLE IF NOT EXISTS employee(
--     id INT,
--     phone VARCHAR(14),
--     PRIMARY KEY (id),
--     FOREIGN KEY (id) REFERENCES users(id)
-- ) ENGINE=InnoDB;

-- CREATE TABLE IF NOT EXISTS publicUser(
--     id INT,
--     phone VARCHAR(14),
--     PRIMARY KEY (id),
--     FOREIGN KEY (id) REFERENCES users(id)
-- ) ENGINE=InnoDB;


-- # "class" for tickets, employee modifies this table
-- CREATE TABLE IF NOT EXISTS ticket(
--     id INT AUTO_INCREMENT,
--     eventID VARCHAR(30) NOT NULL, # foreign key
--     tickPrice DECIMAL(5,4) NOT NULL,  # could include price in event
--     PRIMARY KEY (id)
-- ) ENGINE=InnoDB;
