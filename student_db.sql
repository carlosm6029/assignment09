-- MySQL Script to create student_db 
-- for info 1335 assignment 8
-- emt 12/11/19

-- -----------------------------------------------------
-- Schema student_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `student_db` ;

-- -----------------------------------------------------
-- Schema student_db
-- -----------------------------------------------------
CREATE SCHEMA `student_db` DEFAULT CHARACTER SET utf8 ;
USE `student_db` ;

-- -----------------------------------------------------
-- Table `student_db`.`students`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `student_db`.`students` ;

CREATE TABLE IF NOT EXISTS `student_db`.`students` (
  `stu_id` INT NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NULL,
  `lname` VARCHAR(45) NULL,
  `area_code` CHAR(3) NULL,
  `phone` VARCHAR(8) NULL,
  PRIMARY KEY (`stu_id`),
  UNIQUE INDEX `idstudent_id_UNIQUE` (`stu_id` ASC) );


-- -----------------------------------------------------
-- Table `student_db`.`classes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `student_db`.`classes` ;

CREATE TABLE IF NOT EXISTS `student_db`.`classes` (
  `class_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `dept` VARCHAR(45) NULL,
  `number` VARCHAR(45) NULL,
  `section` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  `meeting_time` VARCHAR(45) NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE INDEX `class_id_UNIQUE` (`class_id` ASC) );


-- -----------------------------------------------------
-- Table `student_db`.`enroll`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `student_db`.`enroll` ;

CREATE TABLE IF NOT EXISTS `student_db`.`enroll` (
  `stu_id` INT NOT NULL,
  `class_id` INT NOT NULL,
  `grade` CHAR(1) NULL,
  PRIMARY KEY (`stu_id`, `class_id`),
  INDEX `fk_enroll_classes1_idx` (`class_id` ASC) ,
  CONSTRAINT `fk_enroll_students`
    FOREIGN KEY (`stu_id`)
    REFERENCES `student_db`.`students` (`stu_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_enroll_classes1`
    FOREIGN KEY (`class_id`)
    REFERENCES `student_db`.`classes` (`class_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- insert records to students
-- -----------------------------------------------------

INSERT INTO students (fname, lname, area_code, phone)
  VALUES
  ('patty','melt','402','234-9876'),
  ('bill','fold','402','531-6222'),
  ('sam','winchester','402','234-2346'),
  ('luke','skywalker','402','543-1234'),
  ('charlie','kelly','402','234-6859'),
  ('bilbo','baggins','531','646-3828');

-- -----------------------------------------------------
-- insert records to classes
-- -----------------------------------------------------

INSERT INTO classes (name, dept, number, section, location, meeting_time)
  VALUES
  ('intro. to databases','info','1620','1a', 'sarpy 214', 'm/w 1-2:45 pm'),
  ('intro. to sql','info','2630','ww', 'online', ''),
  ('software engineering I','info','1325','4c', 'soc mahoney 205', 't/h 10-11:45 am'),
  ('software engineering II','info','1335','ww', 'online', ''),
  ('how to leave the shire & live forever','ring','1001','1r','soc mahoney 214', 'f 10-11:45 am'),
  ('living with the demon inside','psych','1666','ww', 'online', ''),
  ('internet scripting jedi mastery','info','2430','2b', 'soc mahoney 205', 'm/w 10-11:45 am');

-- -----------------------------------------------------
-- insert records to enroll
-- -----------------------------------------------------

INSERT INTO enroll (stu_id, class_id, grade)
  VALUES
  (1,2,'A'),
  (2,2,''),
  (5,1,'D'),
  (5,2,''),
  (6,5,''),
  (3,6,'C'),
  (4,7,''),
  (1,3,'');

GRANT SELECT
ON student_db.*
TO webuser@localhost IDENTIFIED BY 'AAaa!!11';
