--1
SELECT * FROM QUIZZ WHERE quizz_id='1';

--2
SELECT * FROM QUIZZ;

--3
SELECT category_id, quizz_theme FROM CATEGORIES
INNER JOIN QUIZZ ON CATEGORIES.quizz_id = QUIZZ.quizz_id WHERE ;

--4
SELECT * FROM CATEGORIES;

--5
SELECT * FROM CATEGORIES WHERE quizz_id='1';

--6
SELECT * FROM QUESTIONS;

--7
SELECT * FROM QUESTIONS WHERE category_id='1';

--8
SELECT * FROM QUESTIONS
INNER JOIN CATEGORIES ON QUESTIONS.category_id = CATEGORIES.category_id
WHERE CATEGORIES.quizz_id='1';

SELECT * FROM QUESTIONS
INNER JOIN CATEGORIES ON QUESTIONS.category_id = CATEGORIES.category_id AND CATEGORIES.quizz_id='1';

--INSERTIONS
--1
INSERT INTO QUIZZ
(quizz_theme, quizz_textcolor, quizz_backcolor)
VALUES
('Preterit','ff0000','0000ff');

--2
INSERT INTO CATEGORIES
(category_name, category_description, quizz_id)
VALUES
('Verbs', 'questions about verbs', '1');

--3
INSERT INTO QUESTIONS
(question_content, question_answer, question_level, category_id)
VALUES
('Who i am ?', 'I am', '1',1);

--Mise à jour
--1
UPDATE QUIZZ SET quizz_theme='', quizz_textcolor='', quizz_backcolor='' 
WHERE quizz_id='1'

--2
UPDATE CATEGORIES SET category_name='', category_description='', quizz_id='' 
WHERE category_id=1;

--3
UPDATE QUESTIONS SET question_content='', question_answer='', question_level='', category_id='' 
WHERE question_id='1';


--SUPPRESION
--1
DELETE FROM QUIZZ WHERE quizz_id=1;

--2
DELETE FROM CATEGORIES WHERE category_id='';

--3
DELETE FROM QUESTIONS WHERE question_id='';

--Vérification 
--1
SELECT COUNT(*) FROM CATEGORIES WHERE quizz_id='';

--2
SELECT COUNT(*) FROM CATEGORIES WHERE CATEGORIES.category_id=''
AND
(
    SELECT COUNT(DISTINCT QUESTIONS.question_level)
    FROM QUESTIONS WHERE QUESTIONS.category_id = CATEGORIES.category_id
)
 = 5 ;
 
 --envoyer le resultat si ou non
SELECT COUNT(DISTINCT QUESTIONS.question_level) = 5
FROM QUESTIONS WHERE QUESTIONS.category_id = '';









