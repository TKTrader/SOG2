-- Dummy data for Olympic Events table

-- CREATE TABLE IF NOT EXISTS olympicEvent(
--     id INT AUTO_INCREMENT,
--     name VARCHAR(50) NOT NULL,
--     date DATE NOT NULL,
--     time  TIME NOT NULL,
--     location VARCHAR(30) NOT NULL,
--     type VARCHAR(5) NOT NULL, #(comp/award/autog),
--     -- check(type in ('comp', 'award', 'autog')),
--     category VARCHAR(30) NOT NULL, # archery, etc
--     ticketPrice DECIMAL(6,2),
--     PRIMARY KEY (id)
-- ) ENGINE=InnoDB;

-- Time and date format are modified in SELECT statements, not in database storage

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
  'Individual (olympic round 70M) MEN',
    '2016-08-14',
    '12:00:00',
    'Arena 1',
    'comp',
    'Archery',
    '20.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Individual (olympic round 70M) WOMEN',
    '2016-08-15',
    '12:00:00',
    'Arena 2',
    'comp',
    'Archery',
    '25.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    '10M Platform WOMEN',
    '2016-08-16',
    '01:00:00',
    'Arena 1',
    'comp',
    'Diving',
    '15.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton MEN',
    '2016-08-16',
    '01:00:00',
    'Arena 2',
    'comp',
    'Badminton',
    '20.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton WOMEN',
    '2016-08-17',
    '01:00:00',
    'Arena 2',
    'comp',
    'Badminton',
    '20.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    '1000M Canoe Single MEN',
    '2016-08-17',
    '02:00:00',
    'Arena 3',
    'comp',
    'Canoe Sprint',
    '10.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Kayak Single WOMEN',
    '2016-08-18',
    '02:00:00',
    'Arena 3',
    'comp',
    'Canoe Slalom',
    '14.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Individual Mixed',
    '2016-08-19',
    '12:00:00',
    'Arena 1',
    'comp',
    'Equestrian Jumping',
    '30.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Kayak Awards Ceremony WOMEN',
    '2016-03-19',
    '02:00:00',
    'Arena 1',
    'award',
    'Canoe Slalom',
    '0.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton WOMEN',
    '2016-03-20',
    '20:00:00',
    'Arena 1',
    'award',
    'Badminton',
    '0.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton MEN',
    '2016-03-20',
    '19:00:00',
    'Arena 1',
    'award',
    'Badminton',
    '0.00'
    );