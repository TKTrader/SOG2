# populate athletes table

-- CREATE TABLE IF NOT EXISTS athlete(
--     id INT,
--     country VARCHAR(30) NOT NULL,
--     heightFeet INT(1),
--     heightInch INT(2),
--     wgt FLOAT(4,1),
--     DOB VARCHAR(8), 
--     FOREIGN KEY (id) REFERENCES users(id),
--     PRIMARY KEY (id)
-- ) ENGINE=InnoDB;

INSERT INTO athletes(id, country, heightFeet, heightInch, wgt, DOB)
VALUES(
    '1',
    'Venezuela',
    '6',
    '1',
    '165.3',
    '1998-06-30'
    );

INSERT INTO athletes(id, country, heightFeet, heightInch, wgt, DOB)
VALUES(
    '2',
    'France',
    '5',
    '5',
    '165.8',
    '1997-02-07'
    );

INSERT INTO athletes(id, country, heightFeet, heightInch, wgt, DOB)
VALUES(
    '3',
    'Greece',
    '6',
    '6',
    '210.1',
    '1587-12-12'
    );

INSERT INTO athletes(id, country, heightFeet, heightInch, wgt, DOB)
VALUES(
    '4',
    'Nigeria',
    '5',
    '11',
    '165.5',
    '2000-08-26'
    );

INSERT INTO athletes(id, country, heightFeet, heightInch, wgt, DOB)
VALUES(
    '5',
    'China',
    '5',
    '10',
    '155.3',
    '1997-03-12'
    );

INSERT INTO athletes(id, country, heightFeet, heightInch, wgt, DOB)
VALUES(
    '6',
    'Germany',
    '7',
    '5',
    '250.0',
    '0666-06-06'
    );