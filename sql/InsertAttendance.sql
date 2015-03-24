SELECT * FROM Session;

INSERT INTO Attendance (Result, idStudent, idSession)
VALUES 
();

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


INSERT INTO Attendance (Result, idStudent, idSession)
SELECT "Present", ms.idStudent, s.idSession
FROM Session s
INNER JOIN Timetable t ON t.idTimetable = s.idTimetable
INNER JOIN ModuleStudents ms ON ms.idModuleCode = t.idModuleCode;


SELECT st.idStudent, st.FirstName, m.Title, s.Date, t.StartTime, t.EndTime, t.Weekday, a.Result
FROM Attendance a
INNER JOIN Student st ON st.idStudent = a.idStudent
INNER JOIN Session s ON s.idSession = a.idSession
INNER JOIN Timetable t ON t.idTimetable = s.idTimetable
INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
WHERE st.idStudent = 20150001;
