/* SQL Manager Lite for MySQL                              5.7.2.52112 */
/* ------------------------------------------------------------------- */
/* Host     : 192.168.56.104                                           */
/* Port     : 3306                                                     */
/* Database : blog                                                     */


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'utf8mb4' */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `blog`
    CHARACTER SET 'utf8mb4'
    COLLATE 'utf8mb4_general_ci';

USE `blog`;

/* Structure for the `members` table : */

CREATE TABLE `members` (
  `id` INTEGER(4) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `password` VARCHAR(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `salt` VARCHAR(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` VARCHAR(200) COLLATE utf8mb4_general_ci NOT NULL,
  `last_login` DATETIME NOT NULL DEFAULT current_timestamp(),
  `failed_login` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`)
) ENGINE=InnoDB
AUTO_INCREMENT=25 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_general_ci'
;

/* Structure for the `phprbac_permissions` table : */

CREATE TABLE `phprbac_permissions` (
  `ID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `Lft` INTEGER(11) NOT NULL,
  `Rght` INTEGER(11) NOT NULL,
  `Title` CHAR(64) COLLATE utf8_bin NOT NULL,
  `Description` TEXT COLLATE utf8_bin NOT NULL,
  PRIMARY KEY USING BTREE (`ID`),
  KEY `Title` USING BTREE (`Title`),
  KEY `Lft` USING BTREE (`Lft`),
  KEY `Rght` USING BTREE (`Rght`)
) ENGINE=InnoDB
AUTO_INCREMENT=3 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_bin'
;

/* Structure for the `phprbac_rolepermissions` table : */

CREATE TABLE `phprbac_rolepermissions` (
  `RoleID` INTEGER(11) NOT NULL,
  `PermissionID` INTEGER(11) NOT NULL,
  `AssignmentDate` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`RoleID`, `PermissionID`)
) ENGINE=InnoDB
ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_bin'
;

/* Structure for the `phprbac_roles` table : */

CREATE TABLE `phprbac_roles` (
  `ID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `Lft` INTEGER(11) NOT NULL,
  `Rght` INTEGER(11) NOT NULL,
  `Title` VARCHAR(128) COLLATE utf8_bin NOT NULL,
  `Description` TEXT COLLATE utf8_bin NOT NULL,
  PRIMARY KEY USING BTREE (`ID`),
  KEY `Title` USING BTREE (`Title`),
  KEY `Lft` USING BTREE (`Lft`),
  KEY `Rght` USING BTREE (`Rght`)
) ENGINE=InnoDB
AUTO_INCREMENT=3 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_bin'
;

/* Structure for the `phprbac_userroles` table : */

CREATE TABLE `phprbac_userroles` (
  `UserID` INTEGER(11) NOT NULL,
  `RoleID` INTEGER(11) NOT NULL,
  `AssignmentDate` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`UserID`, `RoleID`)
) ENGINE=InnoDB
ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_bin'
;

/* Structure for the `posts` table : */

CREATE TABLE `posts` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) COLLATE latin1_swedish_ci NOT NULL,
  `content` TEXT COLLATE latin1_swedish_ci NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY USING BTREE (`id`)
) ENGINE=InnoDB
AUTO_INCREMENT=27 ROW_FORMAT=DYNAMIC CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Data for the `members` table  (LIMIT 0,500) */

INSERT INTO `members` (`id`, `username`, `password`, `salt`, `email`, `last_login`, `failed_login`) VALUES
  (1,'admin','a884ca144e764fe9c5b887d05dfbc6073212da0444c44f4178ebcb8ddf36f4868132a66c719b3c5d7afbdb40b8c671f590c918415d1d7540197b72982b88cad3','5de9a9ab70b9c','admin@123.com','2019-12-06 15:50:33',0),
  (6,'Supreet','b069eefcce42d55f34769dcf93382ee709aebf21733577d52b441bf45f4927ca8edb7d247503a0f5a020189e93f6211f875389ea9e4baa3f96db74cf0143b76f','5deb3c2206c8e','Supu@123.com','2019-12-06 23:44:20',0);
COMMIT;

/* Data for the `phprbac_permissions` table  (LIMIT 0,500) */

INSERT INTO `phprbac_permissions` (`ID`, `Lft`, `Rght`, `Title`, `Description`) VALUES
  (1,0,3,'root',0x726F6F74),
  (2,1,2,'admin',0x41646D696E69737465722053697465);
COMMIT;

/* Data for the `phprbac_rolepermissions` table  (LIMIT 0,500) */

INSERT INTO `phprbac_rolepermissions` (`RoleID`, `PermissionID`, `AssignmentDate`) VALUES
  (1,1,1572284732),
  (2,2,1572287187);
COMMIT;

/* Data for the `phprbac_roles` table  (LIMIT 0,500) */

INSERT INTO `phprbac_roles` (`ID`, `Lft`, `Rght`, `Title`, `Description`) VALUES
  (1,0,3,'root',0x726F6F74),
  (2,1,2,'admin',0x41646D696E6973747261746F72);
COMMIT;

/* Data for the `phprbac_userroles` table  (LIMIT 0,500) */

INSERT INTO `phprbac_userroles` (`UserID`, `RoleID`, `AssignmentDate`) VALUES
  (1,1,1572284732),
  (1,2,1572287187);
COMMIT;

/* Data for the `posts` table  (LIMIT 0,500) */

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
  (24,'safGs','SEGhn','2019-12-06 15:50:39','2019-12-06 15:50:39'),
  (25,'Supreet','fxhsdviaosjz','2019-12-06 23:44:39','2019-12-06 23:44:39'),
  (26,'entrepreneur','a person who organizes and operates a business or businesses, taking on greater than normal financial risks in order to do so.\r\n\"many entrepreneurs see potential in this market\"','2019-12-06 23:45:16','2019-12-06 23:45:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;