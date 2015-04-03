USE db_eco;

SELECT * FROM AssignmentSubmission;
SELECT * FROM Assignment; 

INSERT INTO AssignmentSubmission (idStudent, idAssignment, Grade, DateSubmitted)
VALUES 
(20150001, 2, 0.9, '2015-03-02'),
(20150001, 3, NULL, '2015-04-02');

-- Submitted not Marked
SELECT a.* 
FROM AssignmentSubmission a
WHERE a.DateSubmitted IS NOT NULL
AND a.Grade IS NULL;

-- Submitted and Marked
SELECT a.*
FROM AssignmentSubmission a
WHERE a.DateSubmitted IS NOT NULL
AND a.Grade IS NOT NULL;

-- Submitted 
SELECT a.* 
FROM AssignmentSubmission a
WHERE a.DateSubmitted IS NOT NULL;

-- Submitted Late
SELECT s.* 
FROM AssignmentSubmission s
INNER JOIN Assignment a ON a.idAssignment = s.idAssignment
WHERE s.DateSubmitted IS NOT NULL
AND s.DateSubmitted > a.DueDate;

-- Overdue
SELECT s.* 
FROM AssignmentSubmission s
INNER JOIN Assignment a ON a.idAssignment = s.idAssignment
WHERE s.DateSubmitted IS NULL
AND a.DueDate < NOW();


SELECT a.idAssignment, a.idModuleCode, a.idLecturer, a.Title, a.ReleaseDate, a.DueDate, a.Weighting
FROM Assignment a
INNER JOIN ModuleStudents ms ON ms.idModuleCode = a.idModuleCode
WHERE ms.idStudent = 20150001;


SELECT a.idAssignment, s.idStudent
FROM Assignment a
LEFT JOIN AssignmentSubmission s ON s.idAssignment = a.idAssignment
WHERE a.idModuleCode IN (SELECT ms.idModuleCode
FROM ModuleStudents ms
WHERE ms.idStudent = 20150001)
ORDER BY a.idModuleCode, a.DueDate;

SELECT a.idAssignment, a.idModuleCode, a.idLecturer, a.Title, a.ReleaseDate, a.DueDate, a.Weighting
FROM Assignment a
WHERE a.idAssignment = 1;

SELECT * FROM Assignment;

INSERT INTO AssignmentSubmission(idStudent, idAssignment, Grade, DateSubmitted)
VALUES 
(20150001, 1, 0.9,  '2015-01-17 23:00:00'),
(20150001, 2, 0.4,  '2015-01-19 00:00:00'),
(20150001, 3, 0.6,  '2015-01-16 22:00:00'),
(20150001, 4, 0.7,  '2015-01-17 23:00:00'),
(20150001, 5, 0.8,  '2015-01-10 23:00:00'),
(20150001, 6, 0.5,  '2015-01-08 23:00:00');

INSERT INTO AssignmentSubmission(idStudent, idAssignment, DateSubmitted)
VALUES 
(20150001, 10, '2015-04-10 23:00:00'),
(20150001, 11, '2015-04-20 21:00:00'),
(20150001, 12, '2015-04-15 18:00:00');

SELECT idAssignment, idStudent, Grade, DateSubmitted
FROM AssignmentSubmission
WHERE idAssignment = 1
AND idStudent = 20150001;

SELECT Title, Details, Weighting
FROM AssignmentCritrea
WHERE idAssignment = 1;

SELECT * FROM Lecturer;

SELECT l.idLecturer, s.Title,
                       s.FirstName, s.Surname, s.Mobile, s.Email
                       FROM Lecturer l
                       INNER JOIN Staff s ON s.idStaff = l.idStaff
                       WHERE l.idLecturer = 990001 AND s.Status = "Active";

SELECT * FROM AssignmentSubmission;