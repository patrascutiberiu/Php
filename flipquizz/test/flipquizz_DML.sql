USE flipquizz;

INSERT INTO TEAMS
(team_id, team_name)
VALUES
(1,'DWWM'),
(2, 'CDA'),
(3, 'Formateur');

-- INSERT INTO `QUIZZ`
-- (`quizz_id`, `quizz_name`)
-- VALUES
-- (1,'');

INSERT INTO QUIZZ
(quizz_id, quizz_theme, quizz_textcolor, quizz_backcolor)
VALUES
(1, 'Quizz C# ASP.NET','white','black'),
(2, 'Quizz Flexbox','black','white'),
(3,'Quizz HTML','black','white'),
(4, 'Quizz JS','black','white'),
(5, 'Quizz PHP','white','black'),
(6, 'Quizz C++','black','white'),
(7, 'Quizz UML','white','black'),
(8, 'Quizz BLA','black','white'),
(9, 'Quizz BLABLA','black','white'),
(10, 'Quizz BLABLABLA','white','black');


--2019-11-28 15:04:00
INSERT INTO GAMES
(game_id, game_date, quizz_id)
VALUES
(1, '2019-11-28 15:04:44',1),
(2, '2020-01-03 09:30:01',2),
(3, '2019-02-01 22:25:22',3),
(4, '2018-08-22 14:22:33',4),
(5, '2015-03-11 06:10:12',5),
(6, '2010-06-10 11:10:22',6),
(7, '2005-05-25 03:22:54',7),
(8, '2015-12-12 05:00:00',8),
(9, '2019-11-02 07:00:00',9),
(10,'2018-03-02 09:00:00',9);

INSERT INTO CATEGORIES
(category_id, category_name, category_description, quizz_id)
VALUES
(1,'Music','Music for you',1),
(2, 'Programing', 'Developement in C#',2),
(3,'Life','Trick for a balanced life',3),
(4,'Sport','Bodybuilding',4),
(5,'Career','How you can be a businessman',5),
(6,'Cars','How you can ride without gasoline',6),
(7,'Men','How you can understand a woman',7),
(8,'Wommen','How you can park the car in 3 motion',8),
(9,'Trick','How to sleep with open eyes',9),
(10,'Science','The earth is still flat',10);

INSERT INTO QUESTIONS
(question_id, question_content, question_answer, question_level, category_id)
VALUES
(1,'What is the answer to question no 1 ? ','Answer 1',1,1),
(2,'What is the answer to question no 2 ? ','Answer 2',1,2),
(3,'What is the answer to question no 3 ? ','Answer 3',1,3),
(4,'What is the answer to question no 4 ? ','Answer 4',1,4),
(5,'What is the answer to question no 5 ? ','Answer 5',1,5),
(6,'What is the answer to question no 6 ? ','Answer 6',1,6),
(7,'What is the answer to question no 7 ? ','Answer 7',1,7),
(8,'What is the answer to question no 8 ? ','Answer 8',1,8),
(9,'What is the answer to question no 9 ? ','Answer 9',1,9),
(10,'What is the answer to question no 10 ? ','Answer 10',2,10);
-- (11,'What is the answer to question no 11 ? ','Answer 11',2,11),
-- (12,'What is the answer to question no 12 ? ','Answer 12',2,12),
-- (13,'What is the answer to question no 13 ? ','Answer 13',2,13),
-- (14,'What is the answer to question no 14 ? ','Answer 14',2,14),
-- (15,'What is the answer to question no 15 ? ','Answer 15',2,15),
-- (16,'What is the answer to question no 16 ? ','Answer 16',2,16),
-- (17,'What is the answer to question no 17 ? ','Answer 17',3,17),
-- (18,'What is the answer to question no 18 ? ','Answer 18',3,18),
-- (19,'What is the answer to question no 19 ? ','Answer 19',3,19),
-- (20,'What is the answer to question no 20 ? ','Answer 20',3,20),
-- (21,'What is the answer to question no 21 ? ','Answer 21',3,21),
-- (22,'What is the answer to question no 22 ? ','Answer 22',3,22),
-- (23,'What is the answer to question no 23 ? ','Answer 23',4,23),
-- (24,'What is the answer to question no 24 ? ','Answer 24',4,24),
-- (25,'What is the answer to question no 25 ? ','Answer 25',4,25),
-- (26,'What is the answer to question no 26 ? ','Answer 26',4,26),
-- (27,'What is the answer to question no 27 ? ','Answer 27',4,27),
-- (28,'What is the answer to question no 28 ? ','Answer 28',5,28),
-- (29,'What is the answer to question no 29 ? ','Answer 29',5,29),
-- (30,'What is the answer to question no 30 ? ','Answer 30',5,30);