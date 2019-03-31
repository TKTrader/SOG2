# populate athletes table

-- CREATE TABLE IF NOT EXISTS athlete(
--     id INT,
--     country VARCHAR(30) NOT NULL,
--     height VARCHAR(5) NOT NULL,
--     wgt FLOAT(4,1) NOT NULL,
--     DOB VARCHAR(8), # need date representation
--     FOREIGN KEY (id) REFERENCES users(id),
--     PRIMARY KEY (id)
-- ) ENGINE=InnoDB;

INSERT INTO athletes(id, country, height, wgt, DOB)
VALUES(
    "1",
    "Venezuela",
    concat('5',char(39),'11',char(34)),
    "165.3",
    "1998-06-30"
    );

INSERT INTO athletes(id, country, height, wgt, DOB)
VALUES(
    "2",
    "France",
    concat('5',char(39),'5',char(34)),
    '165.8',
    '1997-02-07'
    );

INSERT INTO athletes(id, country, height, wgt, DOB)
VALUES(
    '3',
    'Greece',
    concat('6',char(39),'6',char(34)),
    '210.1',
    '1587-12-12'
    );

INSERT INTO athletes(id, country, height, wgt, DOB)
VALUES(
    '4',
    'Nigeria',
    concat('5',char(39),'11',char(34)),
    '165.5',
    '2000-08-26'
    );

INSERT INTO athletes(id, country, height, wgt, DOB)
VALUES(
    '5',
    'China',
    concat('5',char(39),'10',char(34)),
    '155.3',
    '1997-03-12'
    );

INSERT INTO athletes(id, country, height, wgt, DOB)
VALUES(
    '6',
    'Germany',
    concat('7',char(39),'5',char(34)),
    '250.0',
    '0666-06-06'
    );