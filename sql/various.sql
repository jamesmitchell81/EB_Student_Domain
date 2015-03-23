SELECT * FROM Staff;

SELECT l.idLecturer, s.Title,
s.FirstName, s.Surname, s.Mobile, s.Email
FROM Lecturer l
INNER JOIN Staff s ON s.idStaff = l.idStaff
WHERE l.idLecturer IN (SELECT m.idLecturer
						FROM ModuleLecturer m
WHERE m.idModuleCode = "C1001");

SELECT l.idLecturer, s.Title,
s.FirstName, s.Surname, s.Mobile, s.Email
FROM Lecturer l
INNER JOIN Staff s ON s.idStaff = l.idLecturer;

SELECT * FROM Lecturer;

SELECT * FROM ModuleLecturer;

SELECT m.idLecturer
FROM ModuleLecturer m
WHERE m.idModuleCode = "C1001";

DROP DATABASE db_eco;

use db_eco;

SELECT * FROM Assignment;

SELECT * FROM AssignmentCritrea;