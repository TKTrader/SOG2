# Data Population for User table (registration)

-- CREATE TABLE IF NOT EXISTS userInfo(
--     id INT AUTO_INCREMENT,
--     firstName VARCHAR(30) NOT NULL,
--     lastName VARCHAR(30) NOT NULL,
--     email VARCHAR(30) NOT NULL UNIQUE,
--     pwd VARCHAR(64) NOT NULL,
--     access VARCHAR(1), # A:Athlete, Employee:E, PublicUser:P
--     PRIMARY KEY (id)
-- ) ENGINE=InnoDB;

# Public Users

INSERT INTO userInfo (firstName, lastName, email, pwd, category)
VALUES(
  'Frankie',
    'Dunlap',
    'fd@th.com',
    'jj998slkjasd09a8',
    'E'
    );

  INSERT INTO userInfo (firstName, lastName, email, pwd, category)
VALUES(
  'Mathilda',
    'VieggerKlemp',
    'mama@phThy.com',
    'jj998sasdasdasdasd9a8',
    'E'
    );

    INSERT INTO userInfo (firstName, lastName, email, pwd, category)
VALUES(
  'Poly',
    'Cracker',
    'evilDoom@algebra.com',
    '9d8s0d98fs09d8fs9dnj3nekj3nksdn',
    'A'
    );

# Employees
    INSERT INTO userInfo (firstName, lastName, email, pwd, category)
VALUES(
  'Mary',
    'Smith',
    'employee1@sogs.com',
    '9d8s0d98fs0asdasasadsdnj3nekj3nksdn',
    'E'
    );    

      INSERT INTO userInfo (firstName, lastName, email, pwd, category)
VALUES(
  'VJ',
    'Sriwisnatnan',
    'employee2@sogs.com',
    '9d8s0d98fs0asdafhjhjj3fdnj3nekj3nksdn',
    'E'
    ); 

    INSERT INTO userInfo (firstName, lastName, email, pwd, category)
VALUES(
  'Joao',
    'Gilberto',
    'employee3@sogs.com',
    '9d8s0d98fs0asdasasadsdnj3neasasdkj3nksdn',
    'E'
    );  

