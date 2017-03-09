<html>
	<head>
		<title>Initializing...</title>
	</head>
	
	<body>
		<?php
			session_start();		
			$conn = mysql_connect('localhost', 'root');
			if (!$conn) {
				die('Could not connect: ' .mysql_error());
			}
			
			$db = "hrdo_dummy_db";
			$Q = "CREATE DATABASE IF NOT EXISTS `{$db}`";

			$result = mysql_query($Q);
			if (!$result) {
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}
			
			$db_selected = mysql_select_db("{$db}", $conn);
			if (!$db_selected) {
				die ("Can\'t use {$db}: " . mysql_error());
			}

			$Q = "CREATE TABLE IF NOT EXISTS `{$db}`.`Accounts`
			(`EmpNo` TEXT NOT NULL, `LastName` TEXT NOT NULL,
			`FirstName` TEXT NOT NULL, `MI` TEXT NOT NULL,
			`Birthday` TEXT NOT NULL, `Unit` TEXT NOT NULL,
			`Dept` TEXT NOT NULL, `Designation` TEXT NOT NULL,
			`EmpType` TEXT NOT NULL, `Address` TEXT NOT NULL) ENGINE = InnoDB;";
			$result = mysql_query($Q);
			if(!$result)
			{
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}
			
			$Q = "CREATE TABLE IF NOT EXISTS `{$db}`.`Transactions`
			(`TransNo` TEXT NOT NULL, `EmpNo` TEXT NOT NULL,
			`TypeOfLeave` TEXT NOT NULL, `LeaveDetails` TEXT NOT NULL,
			`LeaveStatus` TEXT NOT NULL, `StartDate` TEXT NOT NULL,
			`EndDate` TEXT NOT NULL, `Duration` TEXT NOT NULL,
			`RSO` TEXT NOT NULL, `RSOStatus` TEXT NOT NULL,
			`LocalAbroad` TEXT NOT NULL, `SponsorDonor` TEXT NOT NULL,
			`Description` TEXT NOT NULL, `Institution` TEXT NOT NULL,
			`Location` TEXT NOT NULL, `Country` TEXT NOT NULL) ENGINE = InnoDB;";
			$result = mysql_query($Q);
			if(!$result)
			{
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}
			
			$Q = "CREATE TABLE IF NOT EXISTS `hrdo_dummy_db`.`Notifications`
			(`Sender` TEXT NOT NULL, `Receiver` TEXT NOT NULL,
			`Type` TEXT NOT NULL, `Message` TEXT NOT NULL,
			`Status` TEXT NOT NULL, `DateSent` DATE NOT NULL) ENGINE = InnoDB;";
			$result = mysql_query($Q);
			if(!$result)
			{
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}
			
			$Q = "TRUNCATE TABLE {$db}.Accounts";
			$result = mysql_query($Q);
			if(!$result)
			{
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}
			
			$Q = "TRUNCATE TABLE {$db}.Transactions";
			$result = mysql_query($Q);
			if(!$result)
			{
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}
			
			$Q = "TRUNCATE TABLE {$db}.Notifications";
			$result = mysql_query($Q);
			if(!$result)
			{
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}
			
			$Q = "LOAD DATA LOCAL INFILE 'tables/real_data_accounts.csv'
			INTO TABLE {$db}.accounts
			FIELDS TERMINATED BY ','
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\r\n'";
			$result = mysql_query($Q);
			if(!$result)
			{
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}
			
			$Q = "LOAD DATA LOCAL INFILE 'tables/real_data_trans.csv'
			INTO TABLE {$db}.transactions
			FIELDS TERMINATED BY ','
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\r\n'";
			$result = mysql_query($Q);
			if(!$result)
			{
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}
			
			$Q = "LOAD DATA LOCAL INFILE 'tables/notifications.csv'
			INTO TABLE {$db}.notifications
			FIELDS TERMINATED BY ','
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\r\n'";
			$result = mysql_query($Q);
			if(!$result)
			{
				$message  = 'Invalid query: ' .mysql_error() . "\n";
				$message .= 'Whole query: ' .$query;
				die($message);
			}

			mysql_close($conn);
			
			header("Location: pages/admin_pending_applications_page.php");
			exit();
		?>
	</body>
</html>