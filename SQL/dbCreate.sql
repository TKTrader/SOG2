# event schedule needs to be searchable for conflict (award ceremony cant conflict with competition)
# maybe autograph separate since it Can conflict?
# assuming users registering with email, like last project, but we could add user name if those guys want to build it
# on front end

CREATE DATABASE IF NOT EXISTS SOGSdb;

CREATE TABLE IF NOT EXISTS user( #FYI changed user to users
    id INT AUTO_INCREMENT,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL, #FYI changed pwd to password
    access VARCHAR(1), # A:Athlete, Employee:E, PublicUser:P
    PRIMARY KEY (id)
) ENGINE=InnoDB;

# Fields done, needs foreign key
CREATE TABLE IF NOT EXISTS employee(
    id INT AUTO_INCREMENT,
    phone VARCHAR(14),  # how to represent?
    PRIMARY KEY (id)
) ENGINE=InnoDB; # we need to check if this is default storage engine on XAMP, I was just writing this by hand

CREATE TABLE IF NOT EXISTS publicUser(
    id INT AUTO_INCREMENT,
    phone VARCHAR(14),
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS athlete(
    id INT AUTO_INCREMENT,
    country VARCHAR(30) NOT NULL,
    height VARCHAR(5) NOT NULL,
    wgt FLOAT(3,1) NOT NULL,
    DOB VARCHAR(8), # need date representation
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS olympicEvent( #removed all the evt
    id INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    time  TIME NOT NULL,
    location VARCHAR(30) NOT NULL,
    eventType VARCHAR(15) NOT NULL, #(comp/award/autog),
    category VARCHAR (30) NOT NULL, # archery, etc
    PRIMARY KEY (id)
) ENGINE=InnoDB;

# table to match athletes to their events
CREATE TABLE IF NOT EXISTS athleteEvent(
    id INT, # foreign
    eventID INT, #foreign
    placement INT(3)  # athlete rank in event
) ENGINE=InnoDB;

# "class" for tickets, employee modifies this table
CREATE TABLE IF NOT EXISTS ticket(
    id INT AUTO_INCREMENT,
    eventID VARCHAR(30) NOT NULL, # foreign key
    tickPrice, decimal(5,4) NOT NULL,  # could include price in event
    PRIMARY KEY (id)
) ENGINE=InnoDB;

# actual tickets purchased
CREATE TABLE IF NOT EXISTS ticketOrder(
    id INT AUTO_INCREMENT,
    numTicks INT NOT NULL,
    eventID VARCHAR(30) NOT NULL,
    totalPrice, decimal(5,4) NOT NULL,
    purchaseTimeStamp TIMESTAMP(),
    customerID INT, # foreign
    PRIMARY KEY (id)
) ENGINE=InnoDB;

#___________example data inserts for tables
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
  'Individual (olympic round 70M) MEN',
    '2016-08-03',
    '12:00:00',
    'Arena 1',
    'competition',
    'Archery'
    );

INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    'Individual (olympic round 70M) WOMEN',
    '2016-08-03',
    '12:00:00',
    'Arena 2',
    'competition',
    'Archery'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    'Team (olympic round 70M) MEN',
    '2016-08-04',
    '12:00:00',
    'Arena 1',
    'competition',
    'Archery'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    'Team (olympic round 70M) WOMEN',
    '2016-08-04',
    '12:00:00',
    'Arena 2',
    'competition',
    'Archery'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    'Duet',
    '2016-08-05',
    '3:00:00',
    'Arena 3',
    'competition',
    'Artistic Swimming'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    'TEAM',
    '2016-08-06',
    '3:00:00',
    'Arena 4',
    'competition',
    'Artistic Swimming'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '10000M MEN',
    '2016-08-07',
    '1:00:00',
    'Arena 1',
    'competition',
    'Athletics'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '100M MEN',
    '2016-08-08',
    '2:00:00',
    'Arena 2',
    'competition',
    'Athletics'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '110M HURDLES MEN',
    '2016-08-09',
    '5:00:00',
    'Arena 3',
    'competition',
    'Athletics'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '1500M MEN',
    '2016-08-10',
    '6:00:00',
    'Arena 4',
    'competition',
    'Athletics'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '200M MEN',
    '2016-08-11',
    '7:00:00',
    'Arena 5',
    'competition',
    'Athletics'
    );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '20KM RACE WALK MEN',
    '2016-08-12',
    '8:00:00',
    'Arena 1',
    'competition',
    'Athletics'
  );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '3000M STEEPLECHASE MEN',
    '2016-08-13',
    '9:00:00',
    'Arena 2',
    'competition',
    'Athletics'
  );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '400M HURDLES MEN',
    '2016-08-14',
    '10:00:00',
    'Arena 3',
    'competition',
    'Athletics'
  );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '400M MEN',
    '2016-08-15',
    '11:00:00',
    'Arena 4',
    'competition',
    'Athletics'
  );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '4X100M RELAY MEN',
    '2016-08-16',
    '12:00:00',
    'Arena 5',
    'competition',
    'Athletics'
  );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '4X400M RELAY MEN',
    '2016-08-17',
    '1:00:00',
    'Arena 1',
    'competition',
    'Athletics'
  );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '5000M MEN',
    '2016-08-18',
    '2:00:00',
    'Arena 2',
    'competition',
    'Athletics'
  );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '50KM RACE WALK MEN',
    '2016-08-19',
    '3:00:00',
    'Arena 3',
    'competition',
    'Athletics'
  );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    '800M MEN',
    '2016-08-20',
    '4:00:00',
    'Arena 4',
    'competition',
    'Athletics'
  );
INSERT INTO olympicEvent (name, date, time, location, eventType, category)
VALUES(
    'DECATHLON MEN',
    '2016-08-21',
    '5:00:00',
    'Arena 5',
    'competition',
    'Athletics'
  );


/*Categories
Archery
Artistic Swimming
Athletics
Badminton
Basketball
Beach Volleyball
Boxing
Canoe Slalom
Canoe Sprint
Cycling BMX
Cycling Mountain Bike
Cycling Road
Cycling Track
Diving
Equestrian Dressage
Equestrian Eventing
Equestrian Jumping
Fencing
Footbal
Golf
Gymnastics Artistic
Gymnastics Rhythmic
Handball
Hockey
Judo
Marathon Swimming
Modern Pentathlon
Rowing
Rugby
Sailing
Shooting
Swimming
Table Tennis
Taekwondo
Tennis
Trampoline
Triathlon
Volleyball
Water Polo
WeightLifting
Wrestling Freestyle
Wrestling Greco Roman
*/

/*Events under Categories
____________Archery
Individual (olympic round 70M) MEN
Team (olympic round 70M) MEN
Individual (olympic round 70M) WOMEN
Team (olympic round 70M) WOMEN

____________Artistic Swimming
Duet
TEAM
____________Athletics
10000M MEN
100M MEN
110M HURDLES MEN
1500M MEN
200M MEN
20KM RACE WALK MEN
3000M STEEPLECHASE MEN
400M HURDLES MEN
400M MEN
4X100M RELAY MEN
4X400M RELAY MEN
5000M MEN
50KM RACE WALK MEN
800M MEN
DECATHLON MEN
DISCUS THROW MEN
HAMMER THROW MEN
HIGH JUMP MEN
JAVELIN THROW MEN
LONG JUMP MEN
MARATHON MEN
POLE VAULT MEN
SHOT PUT MEN
TRIPLE JUMP MEN
10000M WOMEN
100M HURDLES WOMEN
100M WOMEN
1500M WOMEN
200M WOMEN
20KM RACE WALK WOMEN
3000M STEEPLECHASE WOMEN
400M HURDLES WOMEN
400M WOMEN
4X100M RELAY WOMEN
4X400M RELAY WOMEN
5000M WOMEN
800M WOMEN
DISCUS THROW WOMEN
HAMMER THROW WOMEN
HEPTATHLON WOMEN
HIGH JUMP WOMEN
JAVELIN THROW WOMEN
LONG JUMP WOMEN
MARATHON WOMEN
POLE VAULT WOMEN
SHOT PUT WOMEN
TRIPLE JUMP WOMEN

____________Badminton
DOUBLES MEN
SINGLES MEN
DOUBLES WOMEN
SINGLES WOMEN
DOUBLES MIXED

____________Basketball
BASKETBALL MEN
BASKETBALL WOMEN

____________Beach Volleyball
TOURNAMENT MEN
TOURNAMENT WOMEN

____________Boxing
+ 91KG (SUPER HEAVYWEIGHT) MEN
46 - 49 KG (LIGHT FLY WEIGHT) MEN
UP TO 52 KG (FLY WEIGHT) MEN
UP TO 56 KG (BANTAM WEIGHT) MEN
UP TO 60 KG (LIGHT WEIGHT) MEN
UP TO 64 KG (LIGHT WELTER WEIGHT) MEN
UP TO 69 KG (WELTER WEIGHT) MEN
UP TO 75 KG (MIDDLE WEIGHT) MEN
UP TO 81 KG (LIGHT HEAVY WEIGHT) MEN
UP TO 91 KG (HEAVY WEIGHT) MEN
48 TO 51 KG (FLY WEIGHT) WOMEN
57 TO 60 KG (LIGHT WEIGHT) WOMEN
69 TO 75 KG (MIDDLE WEIGHT) WOMEN

____________Canoe Slalom
C-1 (CANOE SINGLE) MEN
C-2 (CANOE DOUBLE) MEN
K-1 (KAYAK SINGLE) MEN
K-1 (KAYAK SINGLE) WOMEN

____________Canoe Sprint
C-1 1000M (CANOE SINGLE) MEN
C-1 200M (CANOE SINGLE) MEN
C-2 1000M (CANOE DOUBLE) MEN
K-1 1000M (KAYAK SINGLE) MEN
K-1 200M (KAYAK SINGLE) MEN
K-2 1000M (KAYAK DOUBLE) MEN
K-2 200M (KAYAK DOUBLE) MEN
K-4 1000M (KAYAK FOUR) MEN
K-1 200M (KAYAK SINGLE) WOMEN
K-1 500M (KAYAK SINGLE) WOMEN
K-2 500M (KAYAK DOUBLE) WOMEN
K-4 500M (KAYAK FOUR) WOMEN

____________Cycling BMX
RACE MEN
RACE WOMEN

____________Cycling Mountain Bike
CROSS-COUNTRY MEN
CROSS-COUNTRY WOMEN

____________Cycling Road
INDIVIDUAL TIME TRIAL MEN
ROAD RACE MEN
INDIVIDUAL TIME TRIAL WOMEN
ROAD RACE WOMEN

____________Cycling Track
KEIRIN MEN
OMNIUM MEN
SPRINT MEN
TEAM PURSUIT MEN
TEAM SPRINT MEN
KEIRIN WOMEN
OMNIUM WOMEN
SPRINT WOMEN
TEAM PURSUIT WOMEN
TEAM SPRINT WOMEN

____________Diving
10M PLATFORM MEN
3M SPRINGBOARD MEN
SYNCHRONIZED DIVING 10M PLATFORM MEN
SYNCHRONIZED DIVING 3M SPRINGBOARD MEN
10M PLATFORM WOMEN
3M SPRINGBOARD WOMEN
SYNCHRONIZED DIVING 10M PLATFORM WOMEN
SYNCHRONIZED DIVING 3M SPRINGBOARD WOMEN

____________Equestrian Dressage
INDIVIDUAL MIXED
TEAM MIXED

____________Equestrian Eventing
INDIVIDUAL MIXED
TEAM MIXED

____________Equestrian Jumping
INDIVIDUAL MIXED
TEAM MIXED

____________Fencing
ÉPÉE INDIVIDUAL MEN
ÉPÉE TEAM MEN
FOIL INDIVIDUAL MEN
SABRE INDIVIDUAL MEN
SABRE TEAM MEN
ÉPÉE INDIVIDUAL WOMEN
FOIL INDIVIDUAL WOMEN
FOIL TEAM WOMEN
SABRE INDIVIDUAL WOMEN
SABRE TEAM WOMEN

____________Football
16 TEAM TOURNAMENT MEN
12 TEAM TOURNAMENT WOMEN

____________Golf
STROKE PLAY MEN
STROKE PLAY WOMEN

____________Gymnastics Artistic
FLOOR EXERCISES MEN
HORIZONTAL BAR MEN
INDIVIDUAL ALL-ROUND MEN
PARALLEL BARS MEN
POMMEL HORSE MEN
RINGS MEN
TEAM COMPETITION MEN
VAULT MEN
BEAM WOMEN
FLOOR EXERCISES WOMEN
INDIVIDUAL ALL-ROUND WOMEN
TEAM COMPETITION WOMEN
UNEVEN BARS WOMEN
VAULT WOMEN

____________Gymnastics Rhythmic
GROUP ALL-AROUND COMPETITION
INDIVIDUAL ALL-ROUND COMPETITION

____________Handball
12 TEAM TOURNAMENT MEN
12 TEAM TOURNAMENT WOMEN

____________Hockey
12 TEAM TOURNAMENT MEN
12 TEAM TOURNAMENT WOMEN

____________Judo
- 60 KG MEN
+ 100KG (HEAVYWEIGHT) MEN
60 - 66KG (HALF-LIGHTWEIGHT) MEN
66 - 73KG (LIGHTWEIGHT) MEN
73 - 81KG (HALF-MIDDLEWEIGHT) MEN
81 - 90KG (MIDDLEWEIGHT) MEN
90 - 100KG (HALF-HEAVYWEIGHT) MEN
- 48KG (EXTRA-LIGHTWEIGHT) WOMEN
+ 78KG (HEAVYWEIGHT) WOMEN
48 - 52KG (HALF-LIGHTWEIGHT) WOMEN
52 - 57KG (LIGHTWEIGHT) WOMEN
57 - 63KG (HALF-MIDDLEWEIGHT) WOMEN
63 - 70KG (MIDDLEWEIGHT) WOMEN
70 - 78KG (HALF-HEAVYWEIGHT) WOMEN

____________Marathon Swimming
MARATHON - 10 KM MEN
MARATHON - 10 KM WOMEN

____________Modern Pentathlon
INDIVIDUAL COMPETITION MEN
INDIVIDUAL COMPETITION WOMEN

____________Rowing
COXLESS PAIR (2-) MEN
DOUBLE SCULLS (2X) MEN
EIGHT WITH COXSWAIN (8+) MEN
FOUR WITHOUT COXSWAIN (4-) MEN
LIGHTWEIGHT COXLESS FOUR (4-) MEN
LIGHTWEIGHT DOUBLE SCULLS (2X) MEN
QUADRUPLE SCULLS WITHOUT COXSW MEN
SINGLE SCULLS (1X) MEN
DOUBLE SCULLS (2X) WOMEN
EIGHT WITH COXSWAIN (8+) WOMEN
LIGHTWEIGHT DOUBLE SCULLS (2X) WOMEN
PAIR WITHOUT COXSWAIN (2-) WOMEN
QUADRUPLE SCULLS WITHOUT COXSW WOMEN
SINGLE SCULLS (1X) WOMEN

____________Rugby
RUGBY-7 MEN
RUGBY-7 WOMEN

____________Sailing
470 - TWO PERSON DINGHY MEN
49ER - SKIFF MEN
FINN - ONE PERSON DINGHY (HEAVYWEIGHT) MEN
LASER - ONE PERSON DINGHY MEN
RS:X - WINDSURFER MEN
470 - TWO PERSON DINGHY WOMEN
49ER FX WOMEN
LASER RADIAL - ONE PERSON DINGHY WOMEN
RS:X - WINDSURFER WOMEN
NACRA 17 MIXED

____________Shooting
10M AIR PISTOL MEN
10M AIR RIFLE MEN
25M RAPID FIRE PISTOL MEN
50M PISTOL MEN
50M RIFLE 3 POSITIONS MEN
50M RIFLE PRONE MEN
DOUBLE TRAP MEN
SKEET MEN
TRAP MEN
10M AIR PISTOL WOMEN
10M AIR RIFLE WOMEN
25M PISTOL WOMEN
50M RIFLE 3 POSITIONS WOMEN
SKEET WOMEN
TRAP WOMEN

____________Swimming
100M BACKSTROKE MEN
100M BREASTSTROKE MEN
100M BUTTERFLY MEN
100M FREESTYLE MEN
1500M FREESTYLE MEN
200M BACKSTROKE MEN
200M BREASTSTROKE MEN
200M BUTTERFLY MEN
200M FREESTYLE MEN
200M INDIVIDUAL MEDLEY MEN
400M FREESTYLE MEN
400M INDIVIDUAL MEDLEY MEN
4X100M FREESTYLE RELAY MEN
4X100M MEDLEY RELAY MEN
4X200M FREESTYLE RELAY MEN
50M FREESTYLE MEN
MARATHON 10KM MEN
100M BACKSTROKE WOMEN
100M BREASTSTROKE WOMEN
100M BUTTERFLY WOMEN
100M FREESTYLE WOMEN
200M BACKSTROKE WOMEN
200M BREASTSTROKE WOMEN
200M BUTTERFLY WOMEN
200M FREESTYLE WOMEN
200M INDIVIDUAL MEDLEY WOMEN
400M FREESTYLE WOMEN
400M INDIVIDUAL MEDLEY WOMEN
4X100M FREESTYLE RELAY WOMEN
4X100M MEDLEY RELAY WOMEN
4X200M FREESTYLE RELAY WOMEN
50M FREESTYLE WOMEN
800M FREESTYLE WOMEN
MARATHON 10KM WOMEN

____________Table Tennis
SINGLES MEN
TEAM MEN
SINGLES WOMEN
TEAM WOMEN

____________Taekwondo
- 58 KG MEN
+ 80 KG MEN
58 - 68 KG MEN
68 - 80 KG MEN
- 49 KG WOMEN
+ 67 KG WOMEN
49 - 57 KG WOMEN
57 - 67 KG WOMEN

____________Tennis
DOUBLES MEN
SINGLES MEN
DOUBLES WOMEN
SINGLES WOMEN
DOUBLES MIXED

____________Trampoline
INDIVIDUAL COMPETITION MEN
INDIVIDUAL COMPETITION WOMEN

____________Triathlon
INDIVIDUAL MEN
INDIVIDUAL WOMEN

____________Volleyball
12 TEAM TOURNAMENT MEN
12 TEAM TOURNAMENT WOMEN

____________Water Polo
12 TEAM TOURNAMENT MEN
8 TEAM TOURNAMENT WOMEN

____________WeightLifting
+ 105KG MEN
105KG MEN
56KG MEN
62KG MEN
69KG MEN
77KG MEN
85KG MEN
94KG MEN
+ 75KG WOMEN
48KG WOMEN
53KG WOMEN
58KG WOMEN
63KG WOMEN
69KG WOMEN
75KG WOME

____________Wrestling Freestyle
- 55KG MEN
55 - 60KG MEN
60 - 66KG MEN
66 - 74KG MEN
74 - 84KG MEN
84 - 96KG MEN
96 - 120KG MEN
- 48KG WOMEN
48 - 55KG WOMEN
55 - 63KG WOMEN
63 - 72KG WOMEN

____________Wrestling Greco Roman
- 55KG MEN
55 - 60KG MEN
60 - 66KG MEN
66 - 74KG MEN
74 - 84KG MEN
84 - 96KG MEN
96 - 120KG MEN

*/
