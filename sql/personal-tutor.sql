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


-- Staff name, Student Name, Date, Feedback.
SELECT l.idLecturer, sf.Title, sf.FirstName, sf.Surname, st.idStudent,
st.Title, st.FirstName, st.Surname, f.Date, f.Detail
FROM PersonalTutor p
INNER JOIN Lecturer l ON l.idLecturer = p.idLecturer
INNER JOIN Staff sf ON sf.idStaff = l.idStaff
INNER JOIN Student st ON st.idStudent = p.idStudent
INNER JOIN PersonalTutorFeedback f ON f.AssignRef = p.AssignRef
WHERE st.idStudent = 20150001;



