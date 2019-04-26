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
    'Individual Mixed',
    '2016-08-12',
    '12:00:00',
    'Arena 1',
    'comp',
    'Equestrian Jumping',
    '30.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Kayak Awards Ceremony WOMEN',
    '2016-08-13',
    '14:00:00',
    'Arena 1',
    'award',
    'Canoe Slalom',
    '0.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton WOMEN',
    '2016-08-14',
    '20:00:00',
    'Arena 1',
    'award',
    'Badminton',
    '0.00'
    );

INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)
VALUES(
    'Singles Badminton MEN',
    '2016-08-15',
    '19:00:00',
    'Arena 1',
    'award',
    'Badminton',
    '0.00'
    );

INSERT INTO olympicEvent (name, date, time, location, type, category,ticketPrice)
VALUES(
    '5000M MEN',
    '2016-08-16',
    '14:00:00',
    'Arena 2',
    'comp',
    'Athletics',
    '20.00'
  );
INSERT INTO olympicEvent (name, date, time, location, type, category,ticketPrice)
VALUES(
    '50KM RACE WALK MEN',
    '2016-08-17',
    '15:00:00',
    'Arena 3',
    'comp',
    'Athletics',
    '20.00'
  );
INSERT INTO olympicEvent (name, date, time, location, type, category,ticketPrice)
VALUES(
    '800M MEN',
    '2016-08-18',
    '16:00:00',
    'Arena 4',
    'comp',
    'Athletics',
    '20.00'
  );
INSERT INTO olympicEvent (name, date, time, location, type, category, ticketPrice)
VALUES(
    'DECATHLON MEN',
    '2016-08-19',
    '17:00:00',
    'Arena 5',
    'comp',
    'Athletics',
    '20.00'
  );
INSERT INTO olympicEvent (name, date, time, location, type, category, ticketPrice)
VALUES(
    '4X100M RELAY MEN',
    '2016-08-20',
    '12:00:00',
    'Arena 5',
    'comp',
    'Athletics',
    '20.00'
  );
INSERT INTO olympicEvent (name, date, time, location, type, category, ticketPrice)
VALUES(
    '4X400M RELAY MEN',
    '2016-08-21',
    '13:00:00',
    'Arena 1',
    'comp',
    'Athletics',
    '20.00'
  );


#Populate typeList Data
INSERT INTO typeList(type)VALUES('comp');
INSERT INTO typeList(type)VALUES('award');
INSERT INTO typeList(type)VALUES('autog');

#Populate arenaList Data
INSERT INTO arenaList(name)VALUES('Arena 1');
INSERT INTO arenaList(name)VALUES('Arena 2');
INSERT INTO arenaList(name)VALUES('Arena 3');
INSERT INTO arenaList(name)VALUES('Arena 4');
INSERT INTO arenaList(name)VALUES('Arena 5');
INSERT INTO arenaList(name)VALUES('Arena 6');
INSERT INTO arenaList(name)VALUES('Arena 7');
INSERT INTO arenaList(name)VALUES('Arena 8');
INSERT INTO arenaList(name)VALUES('Arena 9');
INSERT INTO arenaList(name)VALUES('Arena 10');
INSERT INTO arenaList(name)VALUES('Arena 11');
INSERT INTO arenaList(name)VALUES('Arena 12');
INSERT INTO arenaList(name)VALUES('Arena 13');
INSERT INTO arenaList(name)VALUES('Arena 14');
INSERT INTO arenaList(name)VALUES('Arena 15');

#Populate categoryList Data
INSERT INTO categoryList(category)VALUES('Archery');
INSERT INTO categoryList(category)VALUES('Artistic Swimming');
INSERT INTO categoryList(category)VALUES('Athletics');
INSERT INTO categoryList(category)VALUES('Badminton');
INSERT INTO categoryList(category)VALUES('Basketball');
INSERT INTO categoryList(category)VALUES('Beach Volleyball');
INSERT INTO categoryList(category)VALUES('Boxing');
INSERT INTO categoryList(category)VALUES('Canoe Slalom');
INSERT INTO categoryList(category)VALUES('Canoe Sprint');
INSERT INTO categoryList(category)VALUES('Cycling BMX');
INSERT INTO categoryList(category)VALUES('Cycling Mountain Bike');
INSERT INTO categoryList(category)VALUES('Cycling Road');
INSERT INTO categoryList(category)VALUES('Cycling Track');
INSERT INTO categoryList(category)VALUES('Diving');
INSERT INTO categoryList(category)VALUES('Equestrian Dressage');
INSERT INTO categoryList(category)VALUES('Equestrian Eventing');
INSERT INTO categoryList(category)VALUES('Equestrian Jumping');
INSERT INTO categoryList(category)VALUES('Fencing');
INSERT INTO categoryList(category)VALUES('Football');
INSERT INTO categoryList(category)VALUES('Golf');
INSERT INTO categoryList(category)VALUES('Gymnastics Artistic');
INSERT INTO categoryList(category)VALUES('Gymnastics Rhythmic');
INSERT INTO categoryList(category)VALUES('Handball');
INSERT INTO categoryList(category)VALUES('Hockey');
INSERT INTO categoryList(category)VALUES('Judo');
INSERT INTO categoryList(category)VALUES('Marathon Swimming');
INSERT INTO categoryList(category)VALUES('Modern Pentathlon');
INSERT INTO categoryList(category)VALUES('Rowing');
INSERT INTO categoryList(category)VALUES('Rugby');
INSERT INTO categoryList(category)VALUES('Sailing');
INSERT INTO categoryList(category)VALUES('Shooting');
INSERT INTO categoryList(category)VALUES('Swimming');
INSERT INTO categoryList(category)VALUES('Table Tennis');
INSERT INTO categoryList(category)VALUES('Taekwondo');
INSERT INTO categoryList(category)VALUES('Tennis');
INSERT INTO categoryList(category)VALUES('Trampoline');
INSERT INTO categoryList(category)VALUES('Triathlon');
INSERT INTO categoryList(category)VALUES('Volleyball');
INSERT INTO categoryList(category)VALUES('Water Polo');
INSERT INTO categoryList(category)VALUES('WeightLifting');
INSERT INTO categoryList(category)VALUES('Wrestling Freestyle');
INSERT INTO categoryList(category)VALUES('Wrestling Greco Roman');

#Populate eventList Data
INSERT INTO eventList(name, category)VALUES('Individual (olympic round 70M) MEN' , 'Archery');
INSERT INTO eventList(name, category)VALUES('Team (olympic round 70M) MEN', 'Archery');
INSERT INTO eventList(name, category)VALUES('Individual (olympic round 70M) WOMEN', 'Archery');
INSERT INTO eventList(name, category)VALUES('Team (olympic round 70M) WOMEN', 'Archery');
INSERT INTO eventList(name, category)VALUES('Duet', 'Artistic Swimming');
INSERT INTO eventList(name, category)VALUES('TEAM', 'Artistic Swimming');
INSERT INTO eventList(name, category)VALUES('10000M MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('100M MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('110M HURDLES MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('1500M MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('200M MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('20KM RACE WALK MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('3000M STEEPLECHASE MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('400M HURDLES MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('400M MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('4X100M RELAY MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('4X400M RELAY MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('5000M MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('50KM RACE WALK MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('800M MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('DECATHLON MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('DISCUS THROW MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('HAMMER THROW MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('HIGH JUMP MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('JAVELIN THROW MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('LONG JUMP MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('MARATHON MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('POLE VAULT MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('SHOT PUT MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('TRIPLE JUMP MEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('10000M WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('100M HURDLES WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('100M WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('1500M WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('200M WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('20KM RACE WALK WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('3000M STEEPLECHASE WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('400M HURDLES WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('400M WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('4X100M RELAY WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('4X400M RELAY WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('5000M WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('800M WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('DISCUS THROW WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('HAMMER THROW WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('HEPTATHLON WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('HIGH JUMP WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('JAVELIN THROW WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('LONG JUMP WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('MARATHON WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('POLE VAULT WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('SHOT PUT WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('TRIPLE JUMP WOMEN', 'Athletics');
INSERT INTO eventList(name, category)VALUES('DOUBLES MEN', 'Badminton');
INSERT INTO eventList(name, category)VALUES('SINGLES MEN', 'Badminton');
INSERT INTO eventList(name, category)VALUES('DOUBLES WOMEN', 'Badminton');
INSERT INTO eventList(name, category)VALUES('SINGLES WOMEN', 'Badminton');
INSERT INTO eventList(name, category)VALUES('DOUBLES MIXED', 'Badminton');
INSERT INTO eventList(name, category)VALUES('BASKETBALL MEN', 'Basketball');
INSERT INTO eventList(name, category)VALUES('BASKETBALL WOMEN', 'Basketball');
INSERT INTO eventList(name, category)VALUES('TOURNAMENT MEN', 'Beach Volleyball');
INSERT INTO eventList(name, category)VALUES('TOURNAMENT WOMEN', 'Beach Volleyball');
INSERT INTO eventList(name, category)VALUES('+ 91KG (SUPER HEAVYWEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('46 - 49 KG (LIGHT FLY WEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('UP TO 52 KG (FLY WEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('UP TO 56 KG (BANTAM WEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('UP TO 60 KG (LIGHT WEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('UP TO 64 KG (LIGHT WELTER WEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('UP TO 69 KG (WELTER WEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('UP TO 75 KG (MIDDLE WEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('UP TO 81 KG (LIGHT HEAVY WEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('UP TO 91 KG (HEAVY WEIGHT) MEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('48 TO 51 KG (FLY WEIGHT) WOMEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('57 TO 60 KG (LIGHT WEIGHT) WOMEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('69 TO 75 KG (MIDDLE WEIGHT) WOMEN', 'Boxing');
INSERT INTO eventList(name, category)VALUES('C-1 (CANOE SINGLE) MEN', 'Canoe Slalom');
INSERT INTO eventList(name, category)VALUES('C-2 (CANOE DOUBLE) MEN', 'Canoe Slalom');
INSERT INTO eventList(name, category)VALUES('K-1 (KAYAK SINGLE) MEN', 'Canoe Slalom');
INSERT INTO eventList(name, category)VALUES('K-1 (KAYAK SINGLE) WOMEN', 'Canoe Slalom');
INSERT INTO eventList(name, category)VALUES('C-1 1000M (CANOE SINGLE) MEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('C-1 200M (CANOE SINGLE) MEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('C-2 1000M (CANOE DOUBLE) MEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('K-1 1000M (KAYAK SINGLE) MEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('K-1 200M (KAYAK SINGLE) MEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('K-2 1000M (KAYAK DOUBLE) MEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('K-2 200M (KAYAK DOUBLE) MEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('K-4 1000M (KAYAK FOUR) MEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('K-1 200M (KAYAK SINGLE) WOMEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('K-1 500M (KAYAK SINGLE) WOMEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('K-2 500M (KAYAK DOUBLE) WOMEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('K-4 500M (KAYAK FOUR) WOMEN', 'Canoe Sprint');
INSERT INTO eventList(name, category)VALUES('RACE MEN', 'Cycling BMX');
INSERT INTO eventList(name, category)VALUES('RACE WOMEN', 'Cycling BMX');
INSERT INTO eventList(name, category)VALUES('CROSS-COUNTRY MEN', 'Cycling Mountain Bike');
INSERT INTO eventList(name, category)VALUES('CROSS-COUNTRY WOMEN', 'Cycling Mountain Bike');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL TIME TRIAL MEN', 'Cycling Road');
INSERT INTO eventList(name, category)VALUES('ROAD RACE MEN', 'Cycling Road');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL TIME TRIAL WOMEN', 'Cycling Road');
INSERT INTO eventList(name, category)VALUES('ROAD RACE WOMEN', 'Cycling Road');
INSERT INTO eventList(name, category)VALUES('KEIRIN MEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('OMNIUM MEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('SPRINT MEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('TEAM PURSUIT MEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('TEAM SPRINT MEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('KEIRIN WOMEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('OMNIUM WOMEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('SPRINT WOMEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('TEAM PURSUIT WOMEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('TEAM SPRINT WOMEN', 'Cycling Track');
INSERT INTO eventList(name, category)VALUES('10M PLATFORM MEN', 'Diving');
INSERT INTO eventList(name, category)VALUES('3M SPRINGBOARD MEN', 'Diving');
INSERT INTO eventList(name, category)VALUES('SYNCHRONIZED DIVING 10M PLATFORM MEN', 'Diving');
INSERT INTO eventList(name, category)VALUES('SYNCHRONIZED DIVING 3M SPRINGBOARD MEN', 'Diving');
INSERT INTO eventList(name, category)VALUES('10M PLATFORM WOMEN', 'Diving');
INSERT INTO eventList(name, category)VALUES('3M SPRINGBOARD WOMEN', 'Diving');
INSERT INTO eventList(name, category)VALUES('SYNCHRONIZED DIVING 10M PLATFORM WOMEN', 'Diving');
INSERT INTO eventList(name, category)VALUES('SYNCHRONIZED DIVING 3M SPRINGBOARD WOMEN', 'Diving');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL MIXED', 'Equestrian Dressage');
INSERT INTO eventList(name, category)VALUES('TEAM MIXED', 'Equestrian Dressage');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL MIXED', 'Equestrian Eventing');
INSERT INTO eventList(name, category)VALUES('TEAM MIXED', 'Equestrian Eventing');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL MIXED', 'Equestrian Jumping');
INSERT INTO eventList(name, category)VALUES('TEAM MIXED', 'Equestrian Jumping');
INSERT INTO eventList(name, category)VALUES('ÉPÉE INDIVIDUAL MEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('ÉPÉE TEAM MEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('FOIL INDIVIDUAL MEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('SABRE INDIVIDUAL MEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('SABRE TEAM MEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('ÉPÉE INDIVIDUAL WOMEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('FOIL INDIVIDUAL WOMEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('FOIL TEAM WOMEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('SABRE INDIVIDUAL WOMEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('SABRE TEAM WOMEN', 'Fencing');
INSERT INTO eventList(name, category)VALUES('16 TEAM TOURNAMENT MEN', 'Football');
INSERT INTO eventList(name, category)VALUES('12 TEAM TOURNAMENT WOMEN', 'Football');
INSERT INTO eventList(name, category)VALUES('STROKE PLAY MEN', 'Golf');
INSERT INTO eventList(name, category)VALUES('STROKE PLAY WOMEN', 'Golf');
INSERT INTO eventList(name, category)VALUES('FLOOR EXERCISES MEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('HORIZONTAL BAR MEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL ALL-ROUND MEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('PARALLEL BARS MEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('POMMEL HORSE MEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('RINGS MEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('TEAM  MEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('VAULT MEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('BEAM WOMEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('FLOOR EXERCISES WOMEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL ALL-ROUND WOMEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('TEAM  WOMEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('UNEVEN BARS WOMEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('VAULT WOMEN', 'Gymnastics Artistic');
INSERT INTO eventList(name, category)VALUES('GROUP ALL-AROUND', 'Gymnastics Rhythmic');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL ALL-ROUND', 'Gymnastics Rhythmic');
INSERT INTO eventList(name, category)VALUES('12 TEAM TOURNAMENT MEN', 'Handball');
INSERT INTO eventList(name, category)VALUES('12 TEAM TOURNAMENT WOMEN', 'Handball');
INSERT INTO eventList(name, category)VALUES('12 TEAM TOURNAMENT MEN', 'Hockey');
INSERT INTO eventList(name, category)VALUES('12 TEAM TOURNAMENT WOMEN', 'Hockey');
INSERT INTO eventList(name, category)VALUES('- 60 KG MEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('+ 100KG (HEAVYWEIGHT) MEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('60 - 66KG (HALF-LIGHTWEIGHT) MEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('66 - 73KG (LIGHTWEIGHT) MEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('73 - 81KG (HALF-MIDDLEWEIGHT) MEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('81 - 90KG (MIDDLEWEIGHT) MEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('90 - 100KG (HALF-HEAVYWEIGHT) MEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('- 48KG (EXTRA-LIGHTWEIGHT) WOMEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('+ 78KG (HEAVYWEIGHT) WOMEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('48 - 52KG (HALF-LIGHTWEIGHT) WOMEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('52 - 57KG (LIGHTWEIGHT) WOMEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('57 - 63KG (HALF-MIDDLEWEIGHT) WOMEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('63 - 70KG (MIDDLEWEIGHT) WOMEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('70 - 78KG (HALF-HEAVYWEIGHT) WOMEN', 'Judo');
INSERT INTO eventList(name, category)VALUES('MARATHON - 10 KM MEN', 'Marathon Swimming');
INSERT INTO eventList(name, category)VALUES('MARATHON - 10 KM WOMEN', 'Marathon Swimming');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL  MEN', 'Modern Pentathlon');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL  WOMEN', 'Modern Pentathlon');
INSERT INTO eventList(name, category)VALUES('COXLESS PAIR (2-) MEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('DOUBLE SCULLS (2X) MEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('EIGHT WITH COXSWAIN (8+) MEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('FOUR WITHOUT COXSWAIN (4-) MEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('LIGHTWEIGHT COXLESS FOUR (4-) MEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('LIGHTWEIGHT DOUBLE SCULLS (2X) MEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('QUADRUPLE SCULLS WITHOUT COXSW MEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('SINGLE SCULLS (1X) MEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('DOUBLE SCULLS (2X) WOMEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('EIGHT WITH COXSWAIN (8+) WOMEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('LIGHTWEIGHT DOUBLE SCULLS (2X) WOMEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('PAIR WITHOUT COXSWAIN (2-) WOMEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('QUADRUPLE SCULLS WITHOUT COXSW WOMEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('SINGLE SCULLS (1X) WOMEN', 'Rowing');
INSERT INTO eventList(name, category)VALUES('RUGBY-7 MEN', 'Rugby');
INSERT INTO eventList(name, category)VALUES('RUGBY-7 WOMEN', 'Rugby');
INSERT INTO eventList(name, category)VALUES('470 - TWO PERSON DINGHY MEN', 'Sailing');
INSERT INTO eventList(name, category)VALUES('49ER - SKIFF MEN', 'Sailing');
INSERT INTO eventList(name, category)VALUES('FINN - ONE PERSON DINGHY (HEAVYWEIGHT) MEN', 'Sailing');
INSERT INTO eventList(name, category)VALUES('LASER - ONE PERSON DINGHY MEN', 'Sailing');
INSERT INTO eventList(name, category)VALUES('RS:X - WINDSURFER MEN', 'Sailing');
INSERT INTO eventList(name, category)VALUES('470 - TWO PERSON DINGHY WOMEN', 'Sailing');
INSERT INTO eventList(name, category)VALUES('49ER FX WOMEN', 'Sailing');
INSERT INTO eventList(name, category)VALUES('LASER RADIAL - ONE PERSON DINGHY WOMEN', 'Sailing');
INSERT INTO eventList(name, category)VALUES('RS:X - WINDSURFER WOMEN', 'Sailing');
INSERT INTO eventList(name, category)VALUES('NACRA 17 MIXED', 'Sailing');
INSERT INTO eventList(name, category)VALUES('10M AIR PISTOL MEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('10M AIR RIFLE MEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('25M RAPID FIRE PISTOL MEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('50M PISTOL MEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('50M RIFLE 3 POSITIONS MEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('50M RIFLE PRONE MEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('DOUBLE TRAP MEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('SKEET MEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('TRAP MEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('10M AIR PISTOL WOMEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('10M AIR RIFLE WOMEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('25M PISTOL WOMEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('50M RIFLE 3 POSITIONS WOMEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('SKEET WOMEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('TRAP WOMEN', 'Shooting');
INSERT INTO eventList(name, category)VALUES('100M BACKSTROKE MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('100M BREASTSTROKE MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('100M BUTTERFLY MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('100M FREESTYLE MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('1500M FREESTYLE MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M BACKSTROKE MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M BREASTSTROKE MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M BUTTERFLY MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M FREESTYLE MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M INDIVIDUAL MEDLEY MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('400M FREESTYLE MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('400M INDIVIDUAL MEDLEY MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('4X100M FREESTYLE RELAY MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('4X100M MEDLEY RELAY MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('4X200M FREESTYLE RELAY MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('50M FREESTYLE MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('MARATHON 10KM MEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('100M BACKSTROKE WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('100M BREASTSTROKE WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('100M BUTTERFLY WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('100M FREESTYLE WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M BACKSTROKE WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M BREASTSTROKE WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M BUTTERFLY WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M FREESTYLE WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('200M INDIVIDUAL MEDLEY WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('400M FREESTYLE WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('400M INDIVIDUAL MEDLEY WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('4X100M FREESTYLE RELAY WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('4X100M MEDLEY RELAY WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('4X200M FREESTYLE RELAY WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('50M FREESTYLE WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('800M FREESTYLE WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('MARATHON 10KM WOMEN', 'Swimming');
INSERT INTO eventList(name, category)VALUES('SINGLES MEN', 'Table Tennis');
INSERT INTO eventList(name, category)VALUES('TEAM MEN', 'Table Tennis');
INSERT INTO eventList(name, category)VALUES('SINGLES WOMEN', 'Table Tennis');
INSERT INTO eventList(name, category)VALUES('TEAM WOMEN', 'Table Tennis');
INSERT INTO eventList(name, category)VALUES('- 58 KG MEN', 'Taekwondo');
INSERT INTO eventList(name, category)VALUES('+ 80 KG MEN', 'Taekwondo');
INSERT INTO eventList(name, category)VALUES('58 - 68 KG MEN', 'Taekwondo');
INSERT INTO eventList(name, category)VALUES('68 - 80 KG MEN', 'Taekwondo');
INSERT INTO eventList(name, category)VALUES('- 49 KG WOMEN', 'Taekwondo');
INSERT INTO eventList(name, category)VALUES('+ 67 KG WOMEN', 'Taekwondo');
INSERT INTO eventList(name, category)VALUES('49 - 57 KG WOMEN', 'Taekwondo');
INSERT INTO eventList(name, category)VALUES('57 - 67 KG WOMEN', 'Taekwondo');
INSERT INTO eventList(name, category)VALUES('DOUBLES MEN', 'Tennis');
INSERT INTO eventList(name, category)VALUES('SINGLES MEN', 'Tennis');
INSERT INTO eventList(name, category)VALUES('DOUBLES WOMEN', 'Tennis');
INSERT INTO eventList(name, category)VALUES('SINGLES WOMEN', 'Tennis');
INSERT INTO eventList(name, category)VALUES('DOUBLES MIXED', 'Tennis');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL  MEN', 'Trampoline');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL  WOMEN', 'Trampoline');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL MEN', 'Triathlon');
INSERT INTO eventList(name, category)VALUES('INDIVIDUAL WOMEN', 'Triathlon');
INSERT INTO eventList(name, category)VALUES('12 TEAM TOURNAMENT MEN', 'Volleyball');
INSERT INTO eventList(name, category)VALUES('12 TEAM TOURNAMENT WOMEN', 'Volleyball');
INSERT INTO eventList(name, category)VALUES('12 TEAM TOURNAMENT MEN', 'Water Polo');
INSERT INTO eventList(name, category)VALUES('8 TEAM TOURNAMENT WOMEN', 'Water Polo');
INSERT INTO eventList(name, category)VALUES('+ 105KG MEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('105KG MEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('56KG MEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('62KG MEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('69KG MEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('77KG MEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('85KG MEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('94KG MEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('+ 75KG WOMEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('48KG WOMEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('53KG WOMEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('58KG WOMEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('63KG WOMEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('69KG WOMEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('75KG WOMEN', 'WeightLifting');
INSERT INTO eventList(name, category)VALUES('- 55KG MEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('55 - 60KG MEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('60 - 66KG MEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('66 - 74KG MEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('74 - 84KG MEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('84 - 96KG MEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('96 - 120KG MEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('- 48KG WOMEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('48 - 55KG WOMEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('55 - 63KG WOMEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('63 - 72KG WOMEN', 'Wrestling Freestyle');
INSERT INTO eventList(name, category)VALUES('- 55KG MEN', 'Wrestling Greco Roman');
INSERT INTO eventList(name, category)VALUES('55 - 60KG MEN', 'Wrestling Greco Roman');
INSERT INTO eventList(name, category)VALUES('60 - 66KG MEN', 'Wrestling Greco Roman');
INSERT INTO eventList(name, category)VALUES('66 - 74KG MEN', 'Wrestling Greco Roman');
INSERT INTO eventList(name, category)VALUES('74 - 84KG MEN', 'Wrestling Greco Roman');
INSERT INTO eventList(name, category)VALUES('84 - 96KG MEN', 'Wrestling Greco Roman');
INSERT INTO eventList(name, category)VALUES('96 - 120KG MEN', 'Wrestling Greco Roman');
