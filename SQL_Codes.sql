-- Create Notifs Table
CREATE TABLE `hrdo_dummy_db`.`notifications` ( `Sender` TEXT NOT NULL , `Receiver` TEXT NOT NULL , `Type` TEXT NOT NULL , `Message` TEXT NOT NULL , `Status` TEXT NOT NULL , `DateSent` DATE NOT NULL ) ENGINE = InnoDB;
-- Sample Insert into Notifs Table
INSERT INTO `notifications` VALUES ('12047652', 'Admin', 'Request', 'This is a request notification. It contains the necessary details of the applying faculty member and any pre-set message by the system.', 'Pending', '2017-02-14');
-- Sample Search by Employee Number
SELECT * FROM `accounts` WHERE `EmpNo` LIKE '12047652';