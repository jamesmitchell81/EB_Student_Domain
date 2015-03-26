INSERT INTO PersonalTutor (AssignRef, idLecturer, idStudent)
VALUES 
(1, 990001, 20150001),
(2, 990001, 20150002),
(3, 990001, 20150003);


INSERT INTO PersonalTutorFeedback (Date, Detail, AssignRef)
VALUES 
('2015-03-22', "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 1),
('2015-03-23', "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 2),
('2015-03-24', "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 3);
use db_eco;

-- Staff name, Student Name, Date, Feedback.
SELECT l.idLecturer, sf.Title, sf.FirstName, sf.Surname
FROM PersonalTutor p
INNER JOIN Lecturer l ON l.idLecturer = p.idLecturer
INNER JOIN Staff sf ON sf.idStaff = l.idStaff
INNER JOIN Student st ON st.idStudent = p.idStudent
INNER JOIN PersonalTutorFeedback f ON f.AssignRef = p.AssignRef
WHERE st.idStudent = 20150001;

SELECT idLecturer FROM PersonalTutor WHERE idStudent = 20150001;

SELECT * FROM Lecturer;
SELECT * FROM Staff;

SELECT l.idLecturer, s.Title,
s.FirstName, s.Surname, s.Mobile, s.Email
FROM Lecturer l
INNER JOIN Staff s ON s.idStaff = l.idStaff
WHERE l.idLecturer = 990001 AND s.Status = "Active";

SELECT * FROM Staff;

SELECT l.idLecturer, s.Title,
s.FirstName, s.Surname, s.Mobile, s.Email
FROM Lecturer l
INNER JOIN Staff s ON s.idStaff = l.idStaff
WHERE l.idLecturer IN (SELECT m.idLecturer
FROM ModuleLecturer m
WHERE m.idModuleCode IN (SELECT idModuleCode 
	FROM ModuleStudents WHERE idStudent = 20150001));
