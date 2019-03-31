# Data Population for users table (registration)

-- CREATE TABLE IF NOT EXISTS users(
--     id INT AUTO_INCREMENT,
--     firstName VARCHAR(30) NOT NULL,
--     lastName VARCHAR(30) NOT NULL,
--     email VARCHAR(30) NOT NULL UNIQUE,
--     password VARCHAR(64) NOT NULL,
--     access VARCHAR(1), # A:Athlete, Employee:E, PublicUser:P
--     PRIMARY KEY (id)
-- ) ENGINE=InnoDB;

# Athletes
# ------------------------------------------------
INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Nicolas',
    'Maduro',
    'athlete1@sogs.com',
    'jj998slkjasd09a8',
    'A',
    '(666)867-5329'
    );

INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Mathilda',
    'Viegger-Klemp',
    'athlete2@sogs.com',
    'jj998sasdasdasdasd9a8',
    'A',
    '(973)555-5555'
    );

INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Athena',
    'Warrior',
    'athlete3@sogs.com',
    '9d8s0d98fs09d8fs9dnj3nekj3nksdn',
    'A',
    '(909)656-9848'
    );

INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Henri',
    'Matisse',
    'athlete4@sogs.com',
    'd98fs09d8fs9dnj3nekj3nksdn',
    'A',
    '(909)678-9848'
    );

INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Tai',
    'Beast',
    'athlete5@sogs.com',
    '8fs9dnj3nekj3nksdn',
    'A',
    '(987)656-9848'
    );

INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Black',
    'Death',
    'athlete6@sogs.com',
    '9d8sasdad09d8fs9dnj3nekj3nksdn',
    'A',
    '(666)666-6666'
    );

# Employees
# ------------------------------------------------
INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Mary',
    'Smith',
    'employee1@sogs.com',
    '9d8s0d98fs0asdasasadsdnj3nekj3nksdn',
    'E',
    '(909)656-5678'
    );    

INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'VJ',
    'Sriwisnathnan',
    'employee2@sogs.com',
    '9d8s0d98fs0asdafhjhjj3fdnj3nekj3nksdn',
    'E',
    '(987)694-5678'
    ); 

INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Joao',
    'Gilberto',
    'employee3@sogs.com',
    '9d8s0d98fs0asdasasadsdnj3neasasdkj3nksdn',
    'E',
    '(617)852-1706'
    );  

# Public
# ------------------------------------------------
INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Jorge',
    'Public',
    'public1@brazil.com',
    '9d8s0d98fs0asdasaasdj3nksdn',
    'P',
    '(508)852-4394 x567'
    );  

INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Elis',
    'Regina',
    'public2@brazil.com',
    '9d8s0d9asdasd8fs0asdasaasdj3sdfnksdn',
    'P',
    '(508)852-4394 x568'
    );  

INSERT INTO SOGSdb.users(firstName, lastName, email, password, access, phone)
VALUES(
  'Toninho',
    'Horta',
    'public3@brazil.com',
    'ashj1asdasd8fs0asdasaasdj3sdfnksdn',
    'P',
    '(508)852-4394 x569'
    );  