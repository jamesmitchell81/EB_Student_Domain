
use db_eco;

show tables;

SELECT c.idCourseCode, c.Title 
FROM Courses c
INNER JOIN Module m ON m.idCourseCode = c.idCourseCode
INNER JOIN ModuleStudents ms ON ms.idModuleCode = m.idModuleCode
INNER JOIN Student s ON s.idStudent = ms.idModuleCode;
