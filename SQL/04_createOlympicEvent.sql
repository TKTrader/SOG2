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
  'Race WOMEN',
    '2016-08-03',
    '13:00:00',
    'Arena 1',
    'comp',
    'Cycling BMX',
    '20.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
  'Race MEN',
    '2016-08-04',
    '13:00:00',
    'Arena 1',
    'comp',
    'Cycling BMX',
    '20.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
  'Individual (olympic round 70M) MEN',
    '2016-08-05',
    '12:00:00',
    'Arena 1',
    'comp',
    'Archery',
    '20.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Individual (olympic round 70M) WOMEN',
    '2016-08-06',
    '12:00:00',
    'Arena 2',
    'comp',
    'Archery',
    '25.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    '10M Platform WOMEN',
    '2016-08-07',
    '13:00:00',
    'Arena 1',
    'comp',
    'Diving',
    '15.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton MEN',
    '2016-08-08',
    '13:00:00',
    'Arena 2',
    'comp',
    'Badminton',
    '20.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton WOMEN',
    '2016-08-09',
    '13:00:00',
    'Arena 2',
    'comp',
    'Badminton',
    '20.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    '1000M Canoe Single MEN',
    '2016-08-10',
    '14:00:00',
    'Arena 3',
    'comp',
    'Canoe Sprint',
    '10.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Kayak Single WOMEN',
    '2016-08-11',
    '14:00:00',
    'Arena 3',
    'comp',
    'Canoe Slalom',
    '14.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
  'Race WOMEN',
    '2016-08-12',
    '13:00:00',
    'Arena 1',
    'comp',
    'Cycling BMX',
    '20.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
  'Race MEN',
    '2016-08-13',
    '13:00:00',
    'Arena 1',
    'comp',
    'Cycling BMX',
    '20.00'
    );

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
    '13:00:00',
    'Arena 1',
    'comp',
    'Diving',
    '15.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton MEN',
    '2016-08-16',
    '13:00:00',
    'Arena 2',
    'comp',
    'Badminton',
    '20.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton WOMEN',
    '2016-08-17',
    '13:00:00',
    'Arena 2',
    'comp',
    'Badminton',
    '20.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    '1000M Canoe Single MEN',
    '2016-08-17',
    '014:00:00',
    'Arena 3',
    'comp',
    'Canoe Sprint',
    '10.00'
    );
INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Kayak Single WOMEN',
    '2016-08-18',
    '014:00:00',
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
    '2016-08-19',
    '15:00:00',
    'Arena 1',
    'award',
    'Canoe Slalom',
    '0.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton WOMEN',
    '2016-08-20',
    '20:00:00',
    'Arena 1',
    'award',
    'Badminton',
    '0.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton MEN',
    '2016-08-20',
    '19:00:00',
    'Arena 1',
    'award',
    'Badminton',
    '0.00'
    );

INSERT INTO olympicEvent (name, date, time, location, type, category,ticketPrice)
VALUES(
    '5000M MEN',
    '2016-08-18',
    '14:00:00',
    'Arena 2',
    'comp',
    'Athletics',
    '20.00'
  );
INSERT INTO olympicEvent (name, date, time, location, type, category,ticketPrice)
VALUES(
    '50KM RACE WALK MEN',
    '2016-08-19',
    '15:00:00',
    'Arena 3',
    'comp',
    'Athletics',
    '20.00'
  );
INSERT INTO olympicEvent (name, date, time, location, type, category,ticketPrice)
VALUES(
    '800M MEN',
    '2016-08-20',
    '16:00:00',
    'Arena 4',
    'comp',
    'Athletics',
    '20.00'
  );
INSERT INTO olympicEvent (name, date, time, location, type, category,ticketPrice)
VALUES(
    'DECATHLON MEN',
    '2016-08-21',
    '17:00:00',
    'Arena 5',
    'comp',
    'Athletics',
    '20.00'
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
Football
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
TEAM  MEN
VAULT MEN
BEAM WOMEN
FLOOR EXERCISES WOMEN
INDIVIDUAL ALL-ROUND WOMEN
TEAM  WOMEN
UNEVEN BARS WOMEN
VAULT WOMEN

____________Gymnastics Rhythmic
GROUP ALL-AROUND
INDIVIDUAL ALL-ROUND

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
INDIVIDUAL  MEN
INDIVIDUAL  WOMEN

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
INDIVIDUAL  MEN
INDIVIDUAL  WOMEN

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
75KG WOMEN

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
