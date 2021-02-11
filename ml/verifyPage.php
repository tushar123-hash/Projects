<?php 
require("db_conn.php");
session_start();

if(!isset($_SESSION['codeId'])){
	header("Location: reserveTable.php");
}

echo $_SESSION['codeId']." ".$_SESSION['nop']."<br>".$_SESSION['dateTime'];

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
	header("Location: verifyPage.php");
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

		 	$insertToBooked= "INSERT INTO bookedTable (table_id, book_date_time, ";
			$insertToBooked .= "customer_userID, verified, ";
			$insertToBooked .= "nop, regis_date) ";
			$insertToBooked .= "VALUES(' ', ?, ?, ?, ?, NOW())";
			$q = mysqli_stmt_init($dbcon);
			mysqli_stmt_prepare($q, $insertToBooked);
			mysqli_stmt_bind_param($q, 'ssss', htmlspecialchars($_SESSION['dateTime'], ENT_QUOTES), htmlspecialchars($_SESSION['id'], ENT_QUOTES),htmlspecialchars("yes", ENT_QUOTES),htmlspecialchars($_SESSION['nop'], ENT_QUOTES));
			mysqli_stmt_execute($q);

			if (mysqli_stmt_affected_rows($q) > 0) {
				header("Location: paymentGateway.php");
				
				unset($_SESSION['codeId']);
				unset($_SESSION['nop']);
				unset($_SESSION['dateTime']);

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

<div id="VerificationBox">
	<form method="POST">
		<p><input type="text" name="codes" placeholder="Code"></p>
		<input type="hidden" name="hid" value="121">
		<p><input type="submit" name="" value="Verify"></p>
		<p>Send new verification code.<a href="">re-send</a></p>
	</form>
</div>

<div id="dataTable">
	<table>
		<tr>
			<th>Booking Date / Time</th>
			<th>Person</th>
			<th>Confirmed</th>
		</tr>

		<tr>
			<td><?php echo $_SESSION['dateTime']; ?></td>
			<td><?php echo $_SESSION['nop']; ?></td>
			<td><?php echo " - "; ?></td>
		</tr>
	</table>
</div>
</body>
</html>