SELECT * FROM AssignmentSubmission;
SELECT * FROM Assignment; 

-- Submitted not marked
SELECT a.* 
FROM AssignmentSubmission a
WHERE a.DateSubmitted IS NOT NULL
AND a.Grade IS NULL;

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

SELECT a.idAssignment, a.idModuleCode, a.idLecturer, a.Title, a.ReleaseDate, a.DueDate, a.Weighting
FROM Assignment a
INNER JOIN ModuleStudents ms ON ms.idModuleCode = a.idModuleCode
WHERE ms.idStudent = 20150001;

INSERT INTO AssignmentSubmission (idStudent, idAssignment, Grade, DateSubmitted)
VALUES 
(20150001, 2, 0.9, '2015-03-02'),
(20150001, 3, NULL, '2015-04-02');



