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
UPDATE Attendance SET Result = "Absent" WHERE RAND() < 0.3;

-- Mark 20% of attendance records as "Authorised"
UPDATE Attendance SET Result = "Authorised" WHERE RAND() < 0.2;

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




