SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_eco
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_eco` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `db_eco` ;

-- -----------------------------------------------------
-- Table `db_eco`.`Staff`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Staff` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Staff` (
  `idStaff` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(45) NOT NULL,
  `FirstName` VARCHAR(45) NOT NULL,
  `MiddleName` VARCHAR(45) NULL,
  `Surname` VARCHAR(45) NOT NULL,
  `Address` VARCHAR(255) NULL,
  `Mobile` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Gender` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  `Status` VARCHAR(45) NOT NULL,
  `DormancyReason` VARCHAR(45) NULL,
  `AccessLevel` VARCHAR(45) NOT NULL,
  `JobTitle` VARCHAR(45) NULL,
  `qualification` VARCHAR(45) NULL,
  `Role` VARCHAR(45) NULL,
  `SpecialistSubjects` VARCHAR(45) NULL,
  PRIMARY KEY (`idStaff`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Lecturer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Lecturer` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Lecturer` (
  `idLecturer` INT NOT NULL,
  `idStaff` INT NOT NULL,
  PRIMARY KEY (`idLecturer`),
  INDEX `fk_Lecturer_Staff1_idx` (`idStaff` ASC),
  CONSTRAINT `fk_Lecturer_Staff1`
    FOREIGN KEY (`idStaff`)
    REFERENCES `db_eco`.`Staff` (`idStaff`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Courses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Courses` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Courses` (
  `idCourseCode` VARCHAR(5) NOT NULL,
  `Title` VARCHAR(45) NOT NULL,
  `Description` VARCHAR(45) NOT NULL,
  `Status` VARCHAR(45) NOT NULL DEFAULT 'Current',
  `Type` VARCHAR(45) NOT NULL,
  `idLecturer` INT NULL,
  PRIMARY KEY (`idCourseCode`),
  INDEX `fk_Courses_Lecturer1_idx` (`idLecturer` ASC),
  CONSTRAINT `fk_Courses_Lecturer1`
    FOREIGN KEY (`idLecturer`)
    REFERENCES `db_eco`.`Lecturer` (`idLecturer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Student` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Student` (
  `idStudent` INT NOT NULL,
  `Title` VARCHAR(45) NOT NULL,
  `FirstName` VARCHAR(45) NOT NULL,
  `MiddleName` VARCHAR(45) NULL,
  `Surname` VARCHAR(45) NOT NULL,
  `TermAddress` VARCHAR(45) NULL,
  `HomeAddress` VARCHAR(45) NULL,
  `Mobile` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Gender` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  `Status` VARCHAR(45) NOT NULL DEFAULT 'Provisional',
  `DormancyReason` VARCHAR(45) NULL,
  PRIMARY KEY (`idStudent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Module`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Module` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Module` (
  `idModuleCode` VARCHAR(5) NOT NULL,
  `idCourseCode` VARCHAR(5) NOT NULL,
  `Title` VARCHAR(45) NOT NULL,
  `Description` TEXT NOT NULL,
  `Level` VARCHAR(45) NOT NULL,
  `Status` VARCHAR(45) NOT NULL DEFAULT 'Current',
  PRIMARY KEY (`idModuleCode`),
  INDEX `fk_module_course1_idx` (`idCourseCode` ASC),
  CONSTRAINT `fk_module_course1`
    FOREIGN KEY (`idCourseCode`)
    REFERENCES `db_eco`.`Courses` (`idCourseCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Room`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Room` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Room` (
  `idRoomNumber` VARCHAR(5) NOT NULL,
  `Capacity` INT NOT NULL,
  PRIMARY KEY (`idRoomNumber`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`ModuleLecturer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`ModuleLecturer` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`ModuleLecturer` (
  `idLecturer` INT NOT NULL,
  `idModuleCode` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`idLecturer`, `idModuleCode`),
  INDEX `fk_Lecturer_has_Module_Module1_idx` (`idModuleCode` ASC),
  INDEX `fk_Lecturer_has_Module_Lecturer1_idx` (`idLecturer` ASC),
  CONSTRAINT `fk_Lecturer_has_Module_Lecturer1`
    FOREIGN KEY (`idLecturer`)
    REFERENCES `db_eco`.`Lecturer` (`idLecturer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lecturer_has_Module_Module1`
    FOREIGN KEY (`idModuleCode`)
    REFERENCES `db_eco`.`Module` (`idModuleCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Timetable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Timetable` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Timetable` (
  `idTimetable` INT NOT NULL AUTO_INCREMENT,
  `idRoomNumber` VARCHAR(5) NOT NULL,
  `idLecturer` INT NOT NULL,
  `idModuleCode` VARCHAR(5) NOT NULL,
  `StartTime` TIME NOT NULL,
  `EndTime` TIME NOT NULL,
  `Weekday` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`idTimetable`),
  INDEX `fk_Session_Room1_idx` (`idRoomNumber` ASC),
  INDEX `fk_TimetableSession_ModuleLecturer1_idx` (`idLecturer` ASC, `idModuleCode` ASC),
  CONSTRAINT `fk_Session_Room1`
    FOREIGN KEY (`idRoomNumber`)
    REFERENCES `db_eco`.`Room` (`idRoomNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TimetableSession_ModuleLecturer1`
    FOREIGN KEY (`idLecturer` , `idModuleCode`)
    REFERENCES `db_eco`.`ModuleLecturer` (`idLecturer` , `idModuleCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Admin` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Admin` (
  `idAdmin` INT NOT NULL AUTO_INCREMENT,
  `idStaff` INT NOT NULL,
  PRIMARY KEY (`idAdmin`),
  INDEX `fk_Admin_Staff1_idx` (`idStaff` ASC),
  CONSTRAINT `fk_Admin_Staff1`
    FOREIGN KEY (`idStaff`)
    REFERENCES `db_eco`.`Staff` (`idStaff`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`ModuleStudents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`ModuleStudents` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`ModuleStudents` (
  `idStudent` INT NOT NULL,
  `idModuleCode` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`idStudent`, `idModuleCode`),
  INDEX `fk_student_has_module_module1_idx` (`idModuleCode` ASC),
  INDEX `fk_student_has_module_student1_idx` (`idStudent` ASC),
  CONSTRAINT `fk_student_has_module_student1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `db_eco`.`Student` (`idStudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_module_module1`
    FOREIGN KEY (`idModuleCode`)
    REFERENCES `db_eco`.`Module` (`idModuleCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Session`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Session` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Session` (
  `idSession` INT NOT NULL AUTO_INCREMENT,
  `Date` DATE NOT NULL,
  `idTimetable` INT NOT NULL,
  PRIMARY KEY (`idSession`),
  INDEX `fk_Session_Timetable1_idx` (`idTimetable` ASC),
  CONSTRAINT `fk_Session_Timetable1`
    FOREIGN KEY (`idTimetable`)
    REFERENCES `db_eco`.`Timetable` (`idTimetable`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Attendance` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Attendance` (
  `idAttendance` INT NOT NULL AUTO_INCREMENT,
  `Result` VARCHAR(10) NOT NULL,
  `idStudent` INT NOT NULL,
  `idSession` INT NOT NULL,
  INDEX `fk_Attendance_Student1_idx` (`idStudent` ASC),
  PRIMARY KEY (`idAttendance`),
  INDEX `fk_Attendance_Session1_idx` (`idSession` ASC),
  CONSTRAINT `fk_Attendance_Student1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `db_eco`.`Student` (`idStudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Attendance_Session1`
    FOREIGN KEY (`idSession`)
    REFERENCES `db_eco`.`Session` (`idSession`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Assignment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Assignment` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Assignment` (
  `idAssignment` INT NOT NULL AUTO_INCREMENT,
  `idModuleCode` VARCHAR(5) NOT NULL,
  `idLecturer` INT NOT NULL,
  `Title` VARCHAR(45) NOT NULL,
  `ReleaseDate` DATETIME NOT NULL,
  `DueDate` DATETIME NOT NULL,
  PRIMARY KEY (`idAssignment`),
  INDEX `fk_Assignment_module1_idx` (`idModuleCode` ASC),
  INDEX `fk_Assignment_lecturer1_idx` (`idLecturer` ASC),
  UNIQUE INDEX `idAssignment_UNIQUE` (`idAssignment` ASC),
  CONSTRAINT `fk_Assignment_module1`
    FOREIGN KEY (`idModuleCode`)
    REFERENCES `db_eco`.`Module` (`idModuleCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Assignment_lecturer1`
    FOREIGN KEY (`idLecturer`)
    REFERENCES `db_eco`.`Lecturer` (`idLecturer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`AssignmentSubmission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`AssignmentSubmission` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`AssignmentSubmission` (
  `idStudent` INT NOT NULL,
  `idAssignment` INT NOT NULL,
  `Grade` VARCHAR(45) NULL,
  `DateSubmitted` DATETIME NULL,
  INDEX `fk_student_has_Assignment_Assignment1_idx` (`idAssignment` ASC),
  INDEX `fk_student_has_Assignment_student1_idx` (`idStudent` ASC),
  CONSTRAINT `fk_student_has_Assignment_student1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `db_eco`.`Student` (`idStudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_Assignment_Assignment1`
    FOREIGN KEY (`idAssignment`)
    REFERENCES `db_eco`.`Assignment` (`idAssignment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`PersonalTutor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`PersonalTutor` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`PersonalTutor` (
  `AssignRef` INT NOT NULL,
  `idLecturer` INT NOT NULL,
  `idStudent` INT NOT NULL,
  INDEX `fk_Lecturer_has_Student_Student1_idx` (`idStudent` ASC),
  INDEX `fk_Lecturer_has_Student_Lecturer1_idx` (`idLecturer` ASC),
  PRIMARY KEY (`AssignRef`),
  CONSTRAINT `fk_Lecturer_has_Student_Lecturer1`
    FOREIGN KEY (`idLecturer`)
    REFERENCES `db_eco`.`Lecturer` (`idLecturer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lecturer_has_Student_Student1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `db_eco`.`Student` (`idStudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`AssignmentCritrea`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`AssignmentCritrea` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`AssignmentCritrea` (
  `idAssignmentCritrea` INT NOT NULL AUTO_INCREMENT,
  `idAssignment` INT NOT NULL,
  `Title` VARCHAR(45) NOT NULL,
  `Details` TEXT NOT NULL,
  `Weighting` FLOAT NOT NULL,
  PRIMARY KEY (`idAssignmentCritrea`),
  INDEX `fk_AssignmentCritrea_Assignment1_idx` (`idAssignment` ASC),
  CONSTRAINT `fk_AssignmentCritrea_Assignment1`
    FOREIGN KEY (`idAssignment`)
    REFERENCES `db_eco`.`Assignment` (`idAssignment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Events` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Events` (
  `idEvents` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(45) NOT NULL,
  `Description` VARCHAR(255) NULL,
  `StartDateTime` VARCHAR(45) NOT NULL,
  `EndDateTime` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEvents`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`StudentDiary`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`StudentDiary` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`StudentDiary` (
  `idStudent` INT NOT NULL,
  `idEvents` INT NOT NULL,
  PRIMARY KEY (`idStudent`, `idEvents`),
  INDEX `fk_Student_has_Events_Events1_idx` (`idEvents` ASC),
  INDEX `fk_Student_has_Events_Student1_idx` (`idStudent` ASC),
  CONSTRAINT `fk_Student_has_Events_Student1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `db_eco`.`Student` (`idStudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_has_Events_Events1`
    FOREIGN KEY (`idEvents`)
    REFERENCES `db_eco`.`Events` (`idEvents`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`StaffDiary`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`StaffDiary` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`StaffDiary` (
  `idStaff` INT NOT NULL,
  `idEvents` INT NOT NULL,
  PRIMARY KEY (`idStaff`, `idEvents`),
  INDEX `fk_Staff_has_Events_Events1_idx` (`idEvents` ASC),
  INDEX `fk_Staff_has_Events_Staff1_idx` (`idStaff` ASC),
  CONSTRAINT `fk_Staff_has_Events_Staff1`
    FOREIGN KEY (`idStaff`)
    REFERENCES `db_eco`.`Staff` (`idStaff`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Staff_has_Events_Events1`
    FOREIGN KEY (`idEvents`)
    REFERENCES `db_eco`.`Events` (`idEvents`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`Notifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`Notifications` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`Notifications` (
  `idNotifications` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(45) NULL,
  `Body` VARCHAR(255) NULL,
  `NotificationDate` DATETIME NULL,
  `idStaff` INT NOT NULL,
  PRIMARY KEY (`idNotifications`),
  INDEX `fk_Notifications_Staff1_idx` (`idStaff` ASC),
  CONSTRAINT `fk_Notifications_Staff1`
    FOREIGN KEY (`idStaff`)
    REFERENCES `db_eco`.`Staff` (`idStaff`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`NotificationReceivers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`NotificationReceivers` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`NotificationReceivers` (
  `idStudent` INT NOT NULL,
  `idNotifications` INT NOT NULL,
  `Saved` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idStudent`, `idNotifications`),
  INDEX `fk_NotificationReceivers_Student1_idx` (`idStudent` ASC),
  INDEX `fk_NotificationReceivers_Notifications1_idx` (`idNotifications` ASC),
  CONSTRAINT `fk_NotificationReceivers_Student1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `db_eco`.`Student` (`idStudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_NotificationReceivers_Notifications1`
    FOREIGN KEY (`idNotifications`)
    REFERENCES `db_eco`.`Notifications` (`idNotifications`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`StaffArchive`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`StaffArchive` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`StaffArchive` (
  `idStaff` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(45) NOT NULL,
  `FirstName` VARCHAR(45) NOT NULL,
  `MiddleName` VARCHAR(45) NULL,
  `Surname` VARCHAR(45) NOT NULL,
  `Address` VARCHAR(255) NULL,
  `Mobile` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Gender` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  `Status` VARCHAR(45) NOT NULL,
  `DormancyReason` VARCHAR(45) NULL,
  `AccessLevel` VARCHAR(45) NOT NULL,
  `JobTitle` VARCHAR(45) NULL,
  `qualification` VARCHAR(45) NULL,
  `Role` VARCHAR(45) NULL,
  `SpecialistSubjects` VARCHAR(45) NULL,
  PRIMARY KEY (`idStaff`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`StudentArchive`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`StudentArchive` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`StudentArchive` (
  `idStudent` INT NOT NULL,
  `Title` VARCHAR(45) NOT NULL,
  `FirstName` VARCHAR(45) NOT NULL,
  `MiddleName` VARCHAR(45) NULL,
  `Surname` VARCHAR(45) NOT NULL,
  `TermAddress` VARCHAR(45) NULL,
  `HomeAddress` VARCHAR(45) NULL,
  `Mobile` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Gender` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  `Status` VARCHAR(45) NOT NULL DEFAULT 'Provisional',
  `DormancyReason` VARCHAR(45) NULL,
  PRIMARY KEY (`idStudent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`StudentQualifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`StudentQualifications` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`StudentQualifications` (
  `idStudentQualifications` INT NOT NULL,
  `Type` VARCHAR(45) NOT NULL,
  `Subject` VARCHAR(45) NOT NULL,
  `Grade` VARCHAR(45) NOT NULL,
  `idStudent` INT NOT NULL,
  PRIMARY KEY (`idStudentQualifications`),
  INDEX `fk_StudentQualifications_Student1_idx` (`idStudent` ASC),
  CONSTRAINT `fk_StudentQualifications_Student1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `db_eco`.`Student` (`idStudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`PersonalTutorFeedBack`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`PersonalTutorFeedBack` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`PersonalTutorFeedBack` (
  `Date` DATE NOT NULL,
  `Detail` TEXT NOT NULL,
  `AssignRef` INT NOT NULL,
  INDEX `fk_PersonalTutorFeedBack_PersonalTutor1_idx` (`AssignRef` ASC),
  CONSTRAINT `fk_PersonalTutorFeedBack_PersonalTutor1`
    FOREIGN KEY (`AssignRef`)
    REFERENCES `db_eco`.`PersonalTutor` (`AssignRef`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_eco`.`CourseTermDates`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_eco`.`CourseTermDates` ;

CREATE TABLE IF NOT EXISTS `db_eco`.`CourseTermDates` (
  `idCourseTermDates` INT NOT NULL,
  `DateStart` DATE NOT NULL,
  `DateEnd` DATE NOT NULL,
  `BlockName` VARCHAR(45) NOT NULL,
  `idCourseCode` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`idCourseTermDates`),
  INDEX `fk_CourseTermDates_Courses1_idx` (`idCourseCode` ASC),
  CONSTRAINT `fk_CourseTermDates_Courses1`
    FOREIGN KEY (`idCourseCode`)
    REFERENCES `db_eco`.`Courses` (`idCourseCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
