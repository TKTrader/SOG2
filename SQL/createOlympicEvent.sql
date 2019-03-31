-- Dummy data for Olympic Events table

-- CREATE TABLE IF NOT EXISTS olympicEvent(
--     id INT AUTO_INCREMENT,
--     name VARCHAR(50) NOT NULL,
--     date DATE NOT NULL, # dummy
--     time  TIME NOT NULL,
--     location VARCHAR(30) NOT NULL,
--     type VARCHAR(5) NOT NULL, #(comp/award/autog),
--     category VARCHAR(30) NOT NULL, # archery, etc
--     PRIMARY KEY (id)
-- ) ENGINE=InnoDB;

-- Time and date format are modified in SELECT statements, not in database storage

INSERT INTO olympicEvent(name, date, time, location, type, category)
VALUES(
  'Individual (olympic round 70M) MEN',
    '2016-03-28',
    '12:00:00',
    'Arena 1',
    'comp',
    'Archery'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category)
VALUES(
    'Individual (olympic round 70M) WOMEN',
    '2016-03-28',
    '12:00:00',
    'Arena 2',
    'comp',
    'Archery'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category)
VALUES(
    '10M Platform WOMEN',
    '2016-03-31',
    '1:00:00',
    'Arena 1',
    'comp',
    'Diving'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category)
VALUES(
    'Singles Men Badminton',
    '2016-03-31',
    '12:00:00',
    'Arena 2',
    'comp',
    'Badminton'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category)
VALUES(
    'C-1 1000M (CANOE SINGLE) MEN',
    '2016-03-31',
    '2:00:00',
    'Arena 3',
    'comp',
    'Canoe Sprint'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category)
VALUES(
    'Team Mixed',
    '2016-03-29',
    '12:00:00',
    'Arena 1',
    'comp',
    'Equestrian Jumping'
    );