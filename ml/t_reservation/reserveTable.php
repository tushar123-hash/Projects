
<?php  

require("../db_conn.php");

session_start();

//define variable
$messageBox = $bookingMsg = " ";


if (!isset($_SESSION['id'])) {
	header("Location: ../form.php");
} else{

//retrive user information
$selectForUserInfo = "SELECT * FROM user WHERE userid = '".htmlentities($_SESSION['id'])."'";
$resultUI = mysqli_query($dbcon, $selectForUserInfo);
if (mysqli_num_rows($resultUI) > 0) {
	$rowUI = mysqli_fetch_array($resultUI, MYSQLI_ASSOC);
}

// check if already booked
$selectForExisting = "SELECT * FROM bookedtable WHERE customer_userID = '".htmlentities($_SESSION['id'])."'";
$resultBT = mysqli_query($dbcon, $selectForExisting);
if (mysqli_num_rows($resultBT) > 0) {
	echo "string";
	$rowBT = mysqli_fetch_array($resultBT, MYSQLI_ASSOC);
			$bookingMsg .= "Your booking History";

	echo "<style>
		#bookingBox{ display: none; }
		#dataBox{ display: block; }
	</style>";



} else{
	echo "<style> #bookingBox{ display: block; }	</style>";		
	echo "<style> #dataBox{ display: none; }	</style>";		
}	

}



if($_SERVER["REQUEST_METHOD"] == "POST") {

//checks if book table button is clicked
if ($_POST['bookTable'] == 0) {

		//initialize variables
		$nop = "";

		// input sanitized and validated
		$nop = filter_var($_POST['nop'], FILTER_SANITIZE_NUMBER_INT);

		if (empty($nop) && !filter_var($nop, FILTER_VALIDATE_INT)) {
			$messageBox .= "Number of person can not empty";
		} else if (empty($_POST['dtm']) && !isset($_POST['dtm'])) {
			$messageBox .= "date can not be empty";
		}else {
			// store input to session 
			$_SESSION['nop'] = $nop;
			$_SESSION['dateTime'] = $_POST['dtm'];

			$cd = filter_var(mt_rand(111111, 999999), FILTER_SANITIZE_NUMBER_INT);

			$insertToVerify = "INSERT INTO verify (v_id, ";
			$insertToVerify .= "code) VALUES(' ', ?)";
			$q = mysqli_stmt_init($dbcon);
			mysqli_stmt_prepare($q, $insertToVerify);
			mysqli_stmt_bind_param($q, 's', $cd);
			mysqli_stmt_execute($q);

			if (mysqli_stmt_affected_rows($q) > 0) {
				$_SESSION['codeId'] = mysqli_insert_id($dbcon);
				header("Location: verifyPage.php?frm=r_tab");
			} else{
			 	$messageBox .= "SOME ERROR OCCURED";
			 	mysqli_close($dbcon);
			 }


		}
	
}

}
	
// retrieve information from table
$selectForTableBooking = "SELECT * FROM tableavail WHERE table_status='yes'";

$result = mysqli_query($dbcon, $selectForTableBooking);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reserve Table</title>
	<link rel="stylesheet" type="text/css" href="reserveTable.css">
</head>

<body>

<!-- Table booking pop up -->
<section id="section-1">

	<div id="tableBookingBox">
	
	<h1>Table Reservation</h1>
	
	<form method="POST">
	<table>
	<tr>
		<label><th>Name</th>
		<td><input type="text" name="nm" value="<?php echo $rowUI['first_name']." ".$rowUI['last_name']; ?>" disabled="disabled"></td></label>
	</tr>

	<tr>
		<label><th>Number of person</th>
		<td><input type="number" name="nop" min="1" max="15" placeholder="Number of people"></td></label>
	</tr>

	<tr>
		<label><th>Email</th>
		<td><input type="text" name="eml" value="<?php echo $rowUI['email']; ?>" disabled="disabled"></td></label>
	</tr>

	<tr>
		<th style="vertical-align: top;">Select Time</th>
		<td>

		<?php
		//retrieve information
		if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		?>

		<p>
		<label>
		<input type="radio" name="dtm" value="<?php echo htmlspecialchars($row['avail_date_time'], ENT_QUOTES); ?>" checked>
		<?php 
			echo date('d M Y,  D', strtotime(htmlspecialchars($row['avail_date_time'], ENT_QUOTES)))." ".date('h:i a', strtotime(htmlspecialchars($row['avail_date_time'], ENT_QUOTES))); 
		?>

		<br>
		</label>
		</p>
		<?php
		}}
		?>
		</td>	
	</tr>


	</table>
	<p><?php echo $messageBox; ?></p>
	<p>
		<input type="hidden" name="bookTable" value="0">
		<input type="submit" name="tableSbm" value="Proceed">
	</p>

	</form>
	</div>


	<div id="side">
		<div id="sideCont">
			<ul>
				<li> Booking Available </li>
				<li> 24X7 service</li>
				<li> Dine out</li>
				<li> Manage your orders</li>
				<li> Suitable Environment</li>
				<li> Fast serving</li>
			</ul>
		</div>
	</div>
</section>


<div id="dataBox">
	
	<table>
		<tr>
			<th>Name</th>
			<th>Booking Date / Time</th>
			<th>No. of person</th>
		</tr>

		<tr>
			<td><?php echo htmlspecialchars($rowUI['first_name'], ENT_QUOTES)." ".htmlspecialchars($rowUI['last_name'], ENT_QUOTES); ?></td>
			<td><?php echo htmlspecialchars($rowBT['book_date_time'], ENT_QUOTES); ?></td>
			<td><?php echo htmlspecialchars($rowBT['nop'], ENT_QUOTES); ?></td>
		</tr>
	</table>

<?php echo $bookingMsg; ?>

</div>

</body>
</html>
