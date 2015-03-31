USE db_eco;

SELECT * FROM Session;


-- select student timetable.
SELECT s.Date, l.idLecturer, st.Title, st.FirstName, st.Surname,
m.idModuleCode, m.Title, t.StartTime, t.EndTime, r.idRoomNumber
FROM Timetable t
INNER JOIN Session s ON s.idTimetable = t.idTimetable
INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
INNER JOIN Lecturer l ON l.idLecturer = t.idLecturer
INNER JOIN Staff st ON st.idStaff = l.idStaff
INNER JOIN ModuleStudents ms ON ms.idModuleCode = m.idModuleCode
INNER JOIN Room r ON r.idRoomNumber = t.idRoomNumber
WHERE s.Date = '2015-03-02' AND ms.idStudent = 20150001;

-- select student modules.
-- SELECT s.idStudent, m 

-- Select student by module.
SELECT s.idStudent, s.FirstName, m.Title
FROM Student s
INNER JOIN ModuleStudents ms ON ms.idStudent = s.idStudent
INNER JOIN Module m ON m.idModuleCode = ms.idModuleCode;


SELECT s.idSession, t.idTimetable, m.Title
FROM Timetable t
INNER JOIN Session s ON s.idTimetable = t.idTimetable
INNER JOIN Module m ON m.idModuleCode = t.idModuleCode;

-- Select Student timetable.
SELECT s.Date, l.idLecturer, st.Title, st.FirstName, st.Surname,
m.idModuleCode, m.Title, t.StartTime, t.EndTime, r.idRoomNumber
FROM Timetable t
INNER JOIN Session s ON s.idTimetable = t.idTimetable
INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
INNER JOIN Lecturer l ON l.idLecturer = t.idLecturer
INNER JOIN Staff st ON st.idStaff = l.idStaff
INNER JOIN ModuleStudents ms ON ms.idModuleCode = m.idModuleCode
INNER JOIN Room r ON r.idRoomNumber = t.idRoomNumber
WHERE ms.idStudent = 20150001;

-- Populate all dummy students into attendance.
INSERT INTO Attendance (Result, idStudent, idSession)
SELECT "Present", ms.idStudent, s.idSession
FROM Session s
INNER JOIN Timetable t ON t.idTimetable = s.idTimetable
INNER JOIN ModuleStudents ms ON ms.idModuleCode = t.idModuleCode;

-- Mark a third of the attendance records "Absent"
UPDATE Attendance SET Result = "Absent" WHERE RAND() < 0.2;

-- Mark 20% of attendance records as "Authorised"
UPDATE Attendance SET Result = "Authorised" WHERE RAND() < 0.1;

-- Select all attendance records.
SELECT st.idStudent, st.FirstName, m.Title, s.Date, t.StartTime, t.EndTime, t.Weekday, a.Result
FROM Attendance a
INNER JOIN Student st ON st.idStudent = a.idStudent
INNER JOIN Session s ON s.idSession = a.idSession
INNER JOIN Timetable t ON t.idTimetable = s.idTimetable
INNER JOIN Module m ON m.idModuleCode = t.idModuleCode;

SELECT * FROM Attendance;

SELECT st.idStudent, m.idModuleCode, m.Title, 
	   SUM(IF(a.Result = "Absent", 1, 0)) AS Absent,
	   SUM(IF(a.Result = "Present", 1, 0)) AS Present,
	   SUM(IF(a.Result = "Authorised", 1, 0)) AS Authorised,
	   COUNT(a.idAttendance) AS Total
FROM Attendance a
INNER JOIN Student st ON st.idStudent = a.idStudent
INNER JOIN Session s ON s.idSession = a.idSession
INNER JOIN Timetable t ON t.idTimetable = s.idTimetable
INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
WHERE a.idStudent = 20150001
GROUP BY st.idStudent, m.idModuleCode;


-- Select Module Attendance By Week.
SELECT s.Date, a.Result
FROM Attendance a
INNER JOIN Session s ON s.idSession = a.idSession
INNER JOIN Timetable t ON t.idTimetable = s.idTimetable
INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
INNER JOIN Student st ON st.idStudent = a.idStudent
WHERE m.idModuleCode = "C1001" AND st.idStudent = 20150001
AND s.Date BETWEEN '2015-01-01' AND '2015-04-01'
ORDER BY s.Date DESC;

INSERT INTO CourseAcademicYear(DateStart, DateEnd, idCourseCode)
VALUES 
('2014-09-29', '2015-05-01', "WU001"),
('2015-09-29', '2016-05-01', "WU001"),
('2016-09-29', '2017-05-01', "WU001");

SELECT y.DateStart, y.DateEnd
FROM CourseAcademicYear y
INNER JOIN Module m ON m.idCourseCode = y.idCourseCode
INNER JOIN ModuleStudents s ON s.idModuleCode = m.idModuleCode
WHERE YEAR(DateStart) = 2014
AND YEAR(DateEnd) = 2015
AND s.idStudent = 20150001
GROUP BY y.idCourseCode;

-- create term dates.
INSERT INTO CourseTermDates(idCourseTermDates, DateStart, DateEnd, BlockName, idCourseCode)
VALUES 
(1, '2014-09-29', '2014-12-19', "2014-2015 Teaching Block 1", "WU001"),
(2, '2015-01-19', '2015-04-03', "2014-2015 Teaching Block 2", "WU001"),
(3, '2015-01-12', '2015-01-16', "2014-2015 Assessment Week 1", "WU001"),
(4, '2015-04-27', '2015-05-01', "2014-2015 Assessment Week 2", "WU001");

SELECT * FROM CourseTermDates;


SELECT DISTINCT DATE_SUB(s.Date, INTERVAL (DAYOFWEEK(s.Date) - 2) DAY) WeekStart, 
				DATE_ADD(s.Date, INTERVAL ((DAYOFWEEK(s.Date) - 2) + 5) DAY) WeekEnd
FROM Session s
INNER JOIN Attendance a ON a.idSession = s.idSession
INNER JOIN Student st ON st.idStudent = a.idStudent
INNER JOIN ModuleStudents ms ON ms.idStudent = st.idStudent
INNER JOIN Module m ON m.idModuleCode = ms.idModuleCode 
INNER JOIN CourseAcademicYear c ON c.idCourseCode = m.idCourseCode
WHERE YEAR(c.DateStart) = 2014
AND YEAR(c.DateEnd) = 2015
AND st.idStudent = 20150001;


SELECT MIN(StartTime), MAX(EndTime) FROM Timetable;

SELECT DISTINCT DATE_SUB(s.Date, INTERVAL (DAYOFWEEK(s.Date) - 2) DAY) WeekStart, 
				DATE_ADD(s.Date, INTERVAL ((DAYOFWEEK(s.Date) - 2) + 5) DAY) WeekEnd
FROM Session s
WHERE s.Date = '2015-03-30';

SELECT * FROM Session;