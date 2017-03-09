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
  <!-- javascript file location -->
  <script src="header_footer.js"></script>
</head>


<body>
<!-- header -->
<div id="header"></div>

<!-- sidebar -->
<div class="main container">
<div class="ui vertical left visible sidebar menu">
  <div id="profile segment" class="ui basic segment">
    <div class="content">
      <!-- <img src="user_picture.png" class="ui tiny rounded floated image" > -->
      <h2 class="ui header">
        Admin
        <div class="sub header">Human Resource Development Office</div>
        <div class="sub header">admin-0001</div>
      </h3>
    </div>
  </div>

  <div class="ui divider"></div>

  <!-- !!!change what menu item is active here!!! -->
  <a class="side item active">
    <i class="yes blue alarm outline icon"></i>
    <div class="ui vertical divider"></div>
    Pending Applications
  </a>
  <a class="side item">
    <i class="yes blue list layout icon"></i>
    Faculty List
  </a>
  <a class="side item">
    <i class="yes blue database icon"></i>
    Transactions List
  </a>
  <a class="side item">
    <i class="yes blue lock icon"></i>
    Change Password
  </a>
</div>

<!-- THE ACTUAL CONTENT OF THE PAGE HERE!!! -->
<div class="pusher">
  <h1 class="ui header"><i class="alarm icon"></i>Pending Applications</h1>
  <hr>
  <?php
	$conn = mysql_connect('localhost', 'root');
	if (!$conn) {
		die('Could not connect: ' .mysql_error());
	}

	$db_selected = mysql_select_db('hrdo_dummy_db', $conn);
	if (!$db_selected) {
		die ('Can\'t use hrdo_dummy_db: ' . mysql_error());
	}
	
	$Q = "SELECT * FROM `notifications` WHERE `Receiver` LIKE 'Admin';";
	$result = mysql_query($Q);
	if (!$result) {
		$message  = 'Invalid query: ' .mysql_error() . "\n";
		$message .= 'Whole query: ' .$query;
		die($message);
	}
	while ($row = mysql_fetch_assoc($result)) {
		$sender = $row['Sender'];
		$rcvr = $row['Receiver'];
		$msg = $row['Message'];
		$date = $row['DateSent'];
		
		$Q2 = "SELECT * FROM `accounts` WHERE `EmpNo` LIKE '{$sender}';";
		$result2 = mysql_query($Q2);
		if (!$result2) {
			$message  = 'Invalid query: ' .mysql_error() . "\n";
			$message .= 'Whole query: ' .$query;
			die($message);
		}
		while ($row = mysql_fetch_assoc($result2)) {
			$LN = $row['LastName'];
			$FN = $row['FirstName'];
			$MI = $row['MI'];
			$Unit = $row['Unit'];
			$Dept = $row['Dept'];
			$Des = $row['Designation'];
		}
  ?>
  <div class="ui fluid raised link card">
    <div  id="expand1" class="content">
      <div class="ui right floated main menu">

        <div id="expand_modal1" class="ui modal">
        <i class="close icon"></i>
          <div class="header">Leave Request</div>
          <div class="content">
            <strong>MESSAGE:</strong>
            <p></p>
            <p><?php echo $msg?></p>
            <br>
            <strong>REQUEST BY:</strong>
            <div class="ui center aligned container">
              <table class="ui very basic table">
                <tbody>
                  <tr>
                    <td id="left">Name</td>
                    <td><b><?php echo $FN, " ", $MI, " ", $LN ?></b></td>
                  </tr>
                  <tr>
                    <td id="left">Employee No.</td>
                    <td><b><?php echo $sender ?></b></td>
                  </tr>
                  <tr>
                    <td id="left">E-mail Address</td>
                    <td><b>profemail@up.edu.ph</b></td>
                  </tr>
                  <tr>
                    <td id="left">Contact</td>
                    <td><b>0912 345 678</b></td>
                  </tr>
                  <tr>
                    <td id="left">Birthday</td>
                    <td><b>February 30, 2017</b></td>
                  </tr>
                  <tr>
                    <td id="left">Unit</td>
                    <td><b><?php echo $Unit ?></b></td>
                  </tr>
                  <tr>
                    <td id="left">Department</td>
                    <td><b><?php echo $Dept ?></b></td>
                  </tr>
                  <tr>
                    <td id="left">Designation</td>
                    <td><b><?php echo $Des ?></b></td>
                  </tr>
                </tbody>
              </table>
            </div>


          </div>
        </div>

      </div>        
      <div class="header">Leave Request</div>
      <div class="meta">Sent 7 hours ago</div>
      <div class="description">
	<p><?php echo "{$msg} SEE MORE...";?></p>

      </div>
      
    </div>
	<div class="extra content">
      <div class="ui right floated green animated button" href="https://semantic-ui.com" >
        <div class="visible content">
          Accept
        </div>
        <div class="hidden content">
          <i class="checkmark link icon"></i>          
        </div>
      </div>
      <div class="ui right floated red animated button" >
        <div class="visible content">
          Reject
        </div>
        <div class="hidden content">
          <i class="checkmark remove icon"></i>          
        </div>
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
// $('#expand_modal1')
//   .modal('attach events', '#expand1', 'show')
// ;
// $('#expand_modal2')
//   .modal('attach events', '#expand2', 'show')
// ;
// $('#expand_modal3')
//   .modal('attach events', '#expand3', 'show')
// ;
// $('#expand_modal4')
//   .modal('attach events', '#expand4', 'show')
// ;
// $('#expand_modal5')
//   .modal('attach events', '#expand5', 'show')
// ;
// $('#expand_modal6')
//   .modal('attach events', '#expand6', 'show')
// ;
$('.ui.modal')
  .modal('attach events', '.ui.link.card', 'show')
;
</script>

</head>
</html>