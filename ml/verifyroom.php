<?php 
require("db_conn.php");
session_start();

if(!isset($_SESSION['codeId'])){
	header("Location: reserveRoom.php");
}

function regenerateCode()
{
$cd = filter_var(mt_rand(111111, 999999), FILTER_SANITIZE_NUMBER_INT);

$insertToVerify = "INSERT INTO verify (v_id, ";
$insertToVerify .= "code) VALUES(' ', ?)";
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $insertToVerify);
mysqli_stmt_bind_param($q, 's', $cd);
mysqli_stmt_execute($q);

if (mysqli_stmt_affected_rows($q) > 0) {
	$_SESSION['codeId'] = mysqli_insert_id($dbcon);
	header("Location: verifyroom.php");
}
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

// verify
if ($_POST['hid'] == 121) {
	
	$codes = filter_var($_POST['codes'], FILTER_SANITIZE_NUMBER_INT);
	if (empty($codes) && !filter_var($codes, FILTER_VALIDATE_INT)) {
		echo "Please enter code";
	} else {

		$selectToVerify = "SELECT * FROM verify WHERE v_id = '".htmlspecialchars($_SESSION['codeId'], ENT_QUOTES)."'";
		$result = mysqli_query($dbcon, $selectToVerify);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$v_code = $row['code'];
		} else {
		 	mysqli_close($dbcon);
		 }

		 if ($v_code === $codes) {
		 	echo "string";

		 	$insertToBooked = "INSERT INTO roombooked (room_id, customer_userID, check_in, ";
			$insertToBooked .= "check_out, num_of_pr, children, meal, ";
			$insertToBooked .= "verified, regis_date) ";
			$insertToBooked .= "VALUES(' ', ?, ?, ?, ?, ?, ?, ?, NOW())";
			$q = mysqli_stmt_init($dbcon);
			mysqli_stmt_prepare($q, $insertToBooked);
			mysqli_stmt_bind_param($q, 'sssssss', htmlspecialchars($_SESSION['id'], ENT_QUOTES), htmlspecialchars($_SESSION['check_in'], ENT_QUOTES), htmlspecialchars($_SESSION["check_out"], ENT_QUOTES), htmlspecialchars($_SESSION['quantity'], ENT_QUOTES), htmlspecialchars($_SESSION['children'], ENT_QUOTES), htmlspecialchars($_SESSION["meals"], ENT_QUOTES), htmlspecialchars("yes", ENT_QUOTES));

			mysqli_stmt_execute($q);

			if (mysqli_stmt_affected_rows($q) > 0) {
				header("Location: paymentGateway.php");
				
				unset($_SESSION['codeId']);
				unset($_SESSION['room_booked']);

			} else{
			 	mysqli_close($dbcon);
			}

		 	$trunc = "TRUNCATE verify";
		 	mysqli_query($dbcon, $trunc);

		 } else {
		 	echo "Not the code";
		 }

	}
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify</title>
</head>
<body>

<section>
<div id="VerificationBox">

	<form method="POST" id="res_room">
		<h3>Room</h3>
		<p><input type="text" name="codes" placeholder="Code"></p>
		<input type="hidden" name="hid" value="121">
		<p><input type="submit" name="" value="Verify"></p>
		<p>Send new verification code.<a href="">re-send</a></p>
	</form>

</div>


<div id="RRdataTable">
	<h3>Table</h3>
	<table>
		<tr>
			<th>Check In</th>
			<th>Check Out</th>
			<th>Number of Room</th>
			<th>Number of Person</th>
			<th>Children</th>
			<th>Meal</th>
		</tr>

		<tr>
			<td><?php echo $_SESSION["check_in"]; ?></td>
			<td><?php echo $_SESSION["check_out"]; ?></td>
			<td><?php echo $_SESSION["quantity"]; ?></td>
			<td><?php echo $_SESSION["num_of_prs"]; ?></td>
			<td><?php echo $_SESSION["children"] ?></td>
			<td><?php echo $_SESSION["meals"]; ?></td>
		</tr>

	</table>
</div>

</section>

</body>
</html>