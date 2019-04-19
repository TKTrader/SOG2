#  Data Population for users table (registration)
#  need to update passwords with hashes or something

-- CREATE TABLE IF NOT EXISTS users(
--     id INT AUTO_INCREMENT,
--     firstName VARCHAR(30) NOT NULL,
--     lastName VARCHAR(30) NOT NULL,
--     email VARCHAR(30) NOT NULL UNIQUE,
--     password VARCHAR(64) NOT NULL,
--     access VARCHAR(1), # A:Athlete, Employee:E, PublicUser:P
--     PRIMARY KEY (id)
-- ) ENGINE=InnoDB;

# All passwords are "test"

# Athletes
# ------------------------------------------------
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Onepunch',
    'Man',
    'oman@sogs.com',
    '$2y$10$5ld.DVEncVaaDLI8ViH3xecaA7letUf7XGLrnI9FFsC9dGpNFzJUW',
    'A',
    '(666)444-1438'
    );
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Mark',
    'Spitz',
    'mspitz@sogs.com',
    '$2y$10$5ld.DVEncVaaDLI8ViH3xecaA7letUf7XGLrnI9FFsC9dGpNFzJUW',
    'A',
    '(666)946-4591'
    );
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Isabell',
    'Werth',
    'iwerth@sogs.com',
    '$2y$10$5ld.DVEncVaaDLI8ViH3xecaA7letUf7XGLrnI9FFsC9dGpNFzJUW',
    'A',
    '(666)727-0294'
    );
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Jennifer',
    'Thompson',
    'jthompson@sogs.com',
    '$2y$10$5ld.DVEncVaaDLI8ViH3xecaA7letUf7XGLrnI9FFsC9dGpNFzJUW',
    'A',
    '(666)127-5114'
    );
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Birgit',
    'Fischer',
    'bfischer@sogs.com',
    '$2y$10$5ld.DVEncVaaDLI8ViH3xecaA7letUf7XGLrnI9FFsC9dGpNFzJUW',
    'A',
    '(666)421-5134'
    );
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Muhammad',
    'Ali',
    'mali@sogs.com',
    '$2y$10$5ld.DVEncVaaDLI8ViH3xecaA7letUf7XGLrnI9FFsC9dGpNFzJUW',
    'A',
    '(666)785-5194'
    );
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Larisa',
    'Latynina',
    'llatynina@sogs.com',
    '$2y$10$5ld.DVEncVaaDLI8ViH3xecaA7letUf7XGLrnI9FFsC9dGpNFzJUW',
    'A',
    '(666)785-5392'
    );
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Michael',
    'Phelps',
    'mphelps@sogs.com',
    '$2y$10$5ld.DVEncVaaDLI8ViH3xecaA7letUf7XGLrnI9FFsC9dGpNFzJUW',
    'A',
    '(666)867-5392'
    );
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Nicolas',
    'Maduro',
    'athlete1@sogs.com',
    '$2y$10$5ld.DVEncVaaDLI8ViH3xecaA7letUf7XGLrnI9FFsC9dGpNFzJUW',
    'A',
    '(666)867-5329'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Mathilda',
    'Viegger-Klemp',
    'athlete2@sogs.com',
    '$2y$10$AxjXdkqz4QlIFSgHLihaDupk/MVO6YeCNYL5tumCrsUEOEmOWJq1y',
    'A',
    '(973)555-5555'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Athena',
    'Warrior',
    'athlete3@sogs.com',
    '$2y$10$kPduDF3/Dg0EpP6t/o6CKOcBapvHBk3JVcVAJOn2fGa05mHANktWq',
    'A',
    '(909)656-9848'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Henri',
    'Matisse',
    'HenriMatisse@sogs.com',
    '$2y$10$MfWF6jIUc6Hqm06Ux9ekh.s/QdtBjVI953VDFaIm6pIzOYe/rsNf.',
    'A',
    '(909)678-9848'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Tai',
    'Beast',
    'TaiBeast@sogs.com',
    '$2y$10$KL1AzOZg1BLH63ah4IATvOJDwFmq4Csl6ORtYm3dsPv.2caP3A6LW',
    'A',
    '(987)656-9848'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
  'Black',
    'Death',
    'BlackDeath@sogs.com',
    '$2y$10$x0dUFzrPUVi9dhdh480iN.fV96V0AkhVazNQcD0LPU1UtXoDqN7au',
    'A',
    '(666)666-6666'
    );

# Employees
# ------------------------------------------------
#Dont delete Demo User, pw: test
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
    'Demo',
    'User',
    'demouser@sogs.com',
    '$2y$10$5.SNhaC2QKIaYtmJXCJjL.F2dL0WVq4L5L.7mj5yOgP/cVD2sBPry',
    'E',
    '(973)111-1111'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
    'Mary',
    'Smith',
    'employee1@sogs.com',
    '$2y$10$lvKoBZrdEpgFa19UYiS2E.jMJPT34VqqM5VV3GJm4/.mo7WnYbqpy',
    'E',
    '(800)656-5678 x567'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
    'VJ',
    'Sriwisnathnan',
    'employee2@sogs.com',
    '$2y$10$3y5txuqVlSMULmzLe/Z3aeT3P4IG1lu4keOemnM5XbWD3HZDkVU4q',
    'E',
    '(800)656-5678 x566'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
    'Joao',
    'Gilberto',
    'employee3@sogs.com',
    '$2y$10$cxnZfdYMy4BY9d8VDLOfQ.TcBf/M3doiwbv7QOkMVsFDBVT9TWLX2',
    'E',
    '(800)656-5678 x567'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
    'Admin',
    'Admin',
    'admin1@sogs.com',
    '$2y$10$OkKoiw73HVQaGiyhjyV29u/v0Gn1LAsOAPvsb8.JF4QohhRNrlP6O',
    'E',
    '(800)656-5678 x000'
    );

# Public
# ------------------------------------------------
INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
    'Jorge',
    'Public',
    'public1@brazil.com',
    '$2y$10$Uz7ndgsfREEfvURytSMgTur0RxGYDnLgqoyVK2jET0zVIJdfbNyVi',
    'P',
    '(617)852-1706'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
    'Elis',
    'Regina',
    'public2@brazil.com',
    '$2y$10$T4KiEeUHqhSJgHcf9NtXye5SNwiHsSdVFAHvHCOkYLXCD/tMCt0Sq',
    'P',
    '(508)852-4394'
    );

INSERT INTO users(firstName, lastName, email, password, access, phone)
VALUES(
    'Toninho',
    'Horta',
    'public3@brazil.com',
    '$2y$10$pGPKaqK8o0szrkGawk0ok.UQc39KzYLi7IOJZriQ.Y1vnnyARqahu',
    'P',
    '(987)694-5678'
    );
