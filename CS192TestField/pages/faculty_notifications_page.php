<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>HRDO Sabbatical Manager</title>
  <link rel="shortcut icon" href="logo_black_icon.ico"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
  <!-- CSS file location -->
  <link href="header_footer_sidebar.css" rel="stylesheet" type="text/css">
  <link href="admin_notifications_page.css" rel="stylesheet" type="text/css">  
  <!-- javascript file location -->
  <script src="header_footer.js"></script>
  <!-- // <script type="text/javascript" src="faculty_account_page.js"></script> -->
</head>


<body>
<!-- header -->
<div id="header"></div>

<!-- sidebar -->
<div class="main container">
<div class="ui vertical left visible sidebar menu">
  <div id="profile segment" class="ui basic segment">
    <div class="content">
	<?php
		$conn = mysql_connect('localhost', 'root');
		if (!$conn) {
			die('Could not connect: ' .mysql_error());
		}

		$db_selected = mysql_select_db('hrdo_dummy_db', $conn);
		if (!$db_selected) {
			die ('Can\'t use hrdo_dummy_db: ' . mysql_error());
		}
		
		$Q = "SELECT * FROM `accounts` WHERE `EmpNo` LIKE '12047652';";
		$result = mysql_query($Q);
		if (!$result) {
			$message  = 'Invalid query: ' .mysql_error() . "\n";
			$message .= 'Whole query: ' .$query;
			die($message);
		}
		while ($row = mysql_fetch_assoc($result)) {
			$EmpNo = $row['EmpNo'];
			$LN = $row['LastName'];
			$FN = $row['FirstName'];
			$MI = $row['MI'];
			$Dept = $row['Dept'];
	?>
      <!-- <img src="user_picture.png" class="ui tiny rounded floated image" > -->
      <h2 class="ui header">
        <?php echo $FN, " ", $MI, " ", $LN; ?>
        <div class="sub header"><?php echo $Dept; ?></div>
        <div class="sub header"><?php echo $EmpNo; ?></div>
      </h3>
		<?php } ?>
    </div>
  </div>

  <div class="ui divider"></div>

  <!-- !!!change what menu item is active here!!! -->
  <a class="side item active">
    <i class="yes blue alarm outline icon"></i>
    <div class="ui vertical divider"></div>
    Notifications
  </a>
  <a class="side item">
    <i class="yes blue write icon"></i>
    Apply
  </a>
  <a class="side item">
    <i class="yes blue user icon"></i>
    Account
  </a>
  <a class="side item">
    <i class="yes blue database icon"></i>
    Transactions
  </a>
</div>

<!-- THE ACTUAL CONTENT OF THE PAGE HERE!!! -->
<div class="pusher">
  <h1 class="ui header"><i class="alarm icon"></i>Notifications</h1>
  <hr>
  <?php
	$Q = "SELECT * FROM `notifications` WHERE `Sender` LIKE 'Admin';";
	$result = mysql_query($Q);
	if (!$result) {
		$message  = 'Invalid query: ' .mysql_error() . "\n";
		$message .= 'Whole query: ' .$query;
		die($message);
	}
	while ($row = mysql_fetch_assoc($result)) {
		$stat = $row['Status'];
		$msg = $row['Message'];
		$date = $row['DateSent'];
  ?>
  <div class="ui fluid raised link card">
    <div  id="expand1" class="content">
      <div class="ui right floated main menu">

        <div id="expand_modal1" class="ui modal">
          <div class="header"><?php echo "Notification: {$stat}"; ?></div>
          <div class="content">
            <p><?php echo $msg; ?></p>
          </div>
        </div>
      </div>        
      <div class="header"><?php echo "Notification: {$stat}"; ?></div>
      <div class="meta">Sent 7 hours ago</div>
      <div class="description">
        <p><?php echo "{$msg} SEE MORE..."; ?></p>
      </div>
    </div>
  </div>
  <?php
	}
		mysql_free_result($result);
		mysql_close($conn);
  ?>

</div>
<!-- footer -->
<div id="footer"></div>

</body>

<script type="text/javascript">
// for triggering modals when button clicked
$('#expand_modal1')
  .modal('attach events', '#expand1', 'show')
;
$('#expand_modal2')
  .modal('attach events', '#expand2', 'show')
;
$('#expand_modal3')
  .modal('attach events', '#expand3', 'show')
;
$('#expand_modal4')
  .modal('attach events', '#expand4', 'show')
;
$('#expand_modal5')
  .modal('attach events', '#expand5', 'show')
;
$('#expand_modal6')
  .modal('attach events', '#expand6', 'show')
;
</script>

</head>
</html>