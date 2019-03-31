-- CREATE TABLE IF NOT EXISTS ticketOrder(
--     id INT AUTO_INCREMENT,
--     eventID VARCHAR(30) NOT NULL, # from events table,
--     numTickets INT NOT NULL,
--     ticketPrice DECIMAL(5,4) NOT NULL, # from events table
--     orderTimeStamp TIMESTAMP NOT NULL,
--     customerID INT NOT NULL, # from users table
--     PRIMARY KEY (id)
-- ) ENGINE=InnoDB;

# Employee Purchased tickets

INSERT INTO ticketOrder(eventID, numTickets, ticketPrice, orderTimeStamp, customerID)
VALUES(
    "3",
    "3",
    "0.00",
    "2017-08-23 13:10:11",
    "1"
    );

INSERT INTO ticketOrder(eventID, numTickets, ticketPrice, orderTimeStamp, customerID)
VALUES(
    "7",
    "2",
    "0.00",
    "2017-08-23 12:08:00",
    "5"
    );

INSERT INTO ticketOrder(eventID, numTickets, ticketPrice, orderTimeStamp, customerID)
VALUES(
    "8",
    "666",
    "0.00",
    "2017-08-22 20:45:38",
    "6"
    );

# Public Purchased tickets

INSERT INTO ticketOrder(eventID, numTickets, ticketPrice, orderTimeStamp, customerID)
VALUES(
    "1",
    "3",
    "20.00",
    "2017-07-23 13:10:11",
    "9"
    );

INSERT INTO ticketOrder(eventID, numTickets, ticketPrice, orderTimeStamp, customerID)
VALUES(
    "6",
    "3",
    "15.00",
    "2017-08-23 16:09:13",
    "10"
    );

INSERT INTO ticketOrder(eventID, numTickets, ticketPrice, orderTimeStamp, customerID)
VALUES(
    "4",
    "10",
    "20.00",
    "2017-06-24 11:45:00",
    "11"
    );