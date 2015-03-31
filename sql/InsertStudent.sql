

INSERT INTO Student (idStudent, Title, FirstName, Surname, TermAddress, HomeAddress, Mobile, Email)
VALUES
(20150001, "Mr", "James", "Mitchell", "44 The Avenue", "45 The Avenue", "00789 000 000", "jm@jm.co.uk"), 
(20150002, "Mr", "Owen", "Routier", "99 The Avenue", "16 The Avenue", "00789 000 001", "or@jm.co.uk"),
(20150003, "Miss", "Isla", "Routier", "22 The Avenue", "90 The Avenue", "00789 000 002", "ir@jm.co.uk");

INSERT INTO Staff (Title, FirstName, Surname, Mobile, Email, Status, AccessLevel)
VALUES 
("Mr", "James", "Mitchell", "07789000000", "jm@jm.co.uk", "Active", "1"),
("Mr", "Owen", "Routier", "07789000001", "or@jm.co.uk", "Active", "1"),
("Mr", "Isla", "Routier", "07789000002", "ir@jm.co.uk", "Active", "1"),
("Mr", "Sally", "Routier", "07789000003", "sr@jm.co.uk", "Active", "1"),
("Mr", "Simon", "Mitchell", "07789000004", "sm@jm.co.uk", "Active", "1"),
("Mr", "Sue", "Mitchell", "07789000005", "sam@jm.co.uk", "Active", "1");

INSERT INTO Notifications (Title, Body, NotificationDate, idStaff)
VALUES 
("This is the first notification", 
"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
'2015-02-03 09:00:00', 1),
("This is the second notification", 
"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
'2015-02-04 10:00:00', 1),
("This is the third notification", 
"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
'2015-02-05 11:00:00', 1),
("This is the 5th notification", 
"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
'2015-02-06 12:00:00', 1);

INSERT INTO NotificationReceivers (idStudent, idNotifications)
VALUES 
(20150001, 1),
(20150001, 2),
(20150001, 3),
(20150001, 4),
(20150002, 1),
(20150002, 2),
(20150003, 3),
(20150003, 4);

INSERT INTO Courses (idCourseCode, Title, Description, Type)
VALUES 
("WU001", "Software engineering", "Lorem ipsum dolor sit amet, consectetur ", "BSc");

INSERT INTO Module (idModuleCode, idCourseCode, Title, Description, Level)
VALUES 
("C1001", "WU001", "Databases", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "4"),
("C1002", "WU001", "SE2", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "4"),
("C1003", "WU001", "System Design and Development", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "4"),
("C1004", "WU001", "Web Programming", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "4"),
("C1005", "WU001", "FSSS", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "4"),
("C1006", "WU001", "Group Project", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "4");

INSERT INTO ModuleStudents (idStudent, idModuleCode)
VALUES 
(20150001, "C1001"),
(20150001, "C1002"),
(20150001, "C1003"),
(20150001, "C1004"),
(20150001, "C1005"),
(20150001, "C1006");

INSERT INTO ModuleStudents (idStudent, idModuleCode)
VALUES 
(20150002, "C1001"),
(20150002, "C1002"),
(20150002, "C1003"),
(20150002, "C1004"),
(20150002, "C1005"),
(20150002, "C1006");

INSERT INTO ModuleStudents (idStudent, idModuleCode)
VALUES 
(20150003, "C1001"),
(20150003, "C1002"),
(20150003, "C1003"),
(20150003, "C1004"),
(20150003, "C1005"),
(20150003, "C1006");

INSERT INTO Lecturer (idLecturer, idStaff)
VALUES 
(990001, 1),
(990002, 2),
(990003, 3),
(990004, 4),
(990005, 5),
(990006, 6);

INSERT INTO ModuleLecturer (idLecturer, idModuleCode)
VALUES 
(990001, "C1001"),
(990002, "C1002"),
(990003, "C1003"),
(990004, "C1004"),
(990005, "C1005"),
(990006, "C1006");

INSERT INTO ModuleLecturer (idLecturer, idModuleCode)
VALUES (990002, "C1001");

INSERT INTO Room (idRoomNumber, Capacity)
VALUES 
("R0001", 50),
("R0002", 20),
("R0003", 30),
("R0004", 40),
("R0005", 50),
("R0006", 60),
("R0007", 70);

INSERT INTO Timetable (idRoomNumber, idLecturer, idModuleCode, StartTime, EndTime, Weekday)
VALUES 
("R0001", 990001, "C1001", '09:00:00', '10:00:00', "Mon"),
("R0002", 990002, "C1002", '11:00:00', '12:00:00', "Mon"),
("R0003", 990003, "C1003", '13:00:00', '14:30:00', "Mon"),
("R0004", 990004, "C1004", '16:00:00', '17:00:00', "Mon"),
("R0005", 990002, "C1001", '12:00:00', '13:30:00', "Tue"),
("R0006", 990006, "C1006", '09:00:00', '11:00:00', "Wed"),
("R0007", 990005, "C1005", '09:00:00', '10:00:00', "Wed"),
("R0001", 990001, "C1001", '09:00:00', '10:00:00', "Thu"),
("R0002", 990002, "C1002", '09:00:00', '10:00:00', "Thu"),
("R0003", 990003, "C1003", '11:00:00', '14:00:00', "Fri");


-- create assignments.
INSERT INTO Assignment (idModuleCode, idLecturer, Title, ReleaseDate, DueDate, Weighting)
VALUES 
("C1001", 990001, "Database Design", '2014-11-01 00:00:00', '2015-01-18 23:59:00', 0.4),
("C1002", 990002, "C++ Algorithms", '2014-10-09 00:00:00', '2015-01-18 23:59:00', 0.4),
("C1003", 990003, "Object Orientated Design", '2014-09-05 00:00:00', '2015-01-18 23:59:00', 0.5),
("C1004", 990004, "Web Databases", '2014-09-18 00:00:00', '2015-01-18 23:59:00', 0.5),
("C1005", 990005, "Introduction to Z", '2014-10-10 00:00:00', '2015-01-18 23:59:00', 0.5),
("C1006", 990006, "Requirements Elicitation", '2014-10-09 00:00:00', '2015-01-18 23:59:00', 0.6),
("C1001", 990001, "Design Theory", '2015-02-01 00:00:00', '2015-05-03 23:59:00', 0.6),
("C1002", 990002, "OO C++", '2015-03-02 00:00:00', '2015-05-03 23:59:00', 0.6),
("C1003", 990003, "Design Patterns", '2015-02-18 00:00:00', '2015-05-03 23:59:00', 0.5),
("C1004", 990004, "PHP and AJAX", '2015-02-10 00:00:00', '2015-05-03 23:59:00', 0.5),
("C1005", 990005, "Strict Z", '2015-01-19 00:00:00', '2015-05-03 23:59:00', 0.5),
("C1006", 990006, "Software Build", '2015-02-01 00:00:00', '2015-05-03 23:59:00', 0.4);


INSERT INTO AssignmentCritrea(idAssignment, Title, Details, Weighting)
VALUES 
(1, "ERD", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(1, "DML", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(2, "Sorting", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(2, "Searching", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(3, "Polymorphism", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(3, "Inheritance", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(4, "Database Interaction", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(4, "Displaying Data", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(5, "Sets", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(5, "Functions", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(6, "Interviews", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(6, "Mapping Current System", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(7, "Normalisation", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(7, "Performance", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(8, "Classes", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(8, "Inheritance", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(9, "MVC", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(9, "Creational Patterns", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(10, "Ajax", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(10, "Web Services", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(11, "Curried Functions", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(11, "Predicate Logic", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(12, "BON, UML", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5),
(12, "Final Build", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 0.5);

SELECT * FROM Session;

