use db_eco;

INSERT INTO Events (Title, Description, StartDateTime, EndDateTime, Type)
VALUES 
("Personal tutor meeting", "Meeting to discuss current progress", '2015-02-02 10:00:00', '2015-02-02 11:00:00', "Tutorials");

INSERT INTO Events (Title, Description, StartDateTime, EndDateTime, Type)
VALUES 
("Pick up new Laptop", "Meeting to discuss current progress", '2015-02-02 11:00:00', '2015-02-02 11:30:00', "Personal");

SELECT * FROM Events;

INSERT INTO StudentDiary(idStudent, idEvents)
VALUES (20150001, 1);


SELECT e.Title, e.Description, e.StartDateTime, e.EndDateTime, e.Type
FROM Events e
INNER JOIN StudentDiary s ON s.idEvents = e.idEvents
WHERE s.idStudent = 20150001
AND date(e.StartDateTime) = '2015-02-02';

SELECT 