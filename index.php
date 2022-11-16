<?php
require 'connect.php';
if (isset($_POST['submit'])) {
	// code...
$stu_id =$_POST['stu_id'];
$fullname =$_POST['fullname'];
$program =$_POST['program'];
$address =$_POST['address'];
$cno =$_POST['cno'];
$pcnum =$_POST['pcnum'];

$qry = mysqli_query($conn, "SELECT * FROM `tb_sttdinfo` WHERE stu_id='$stu_id'");
if (mysqli_num_rows($qry)>0) {
	// code...
?>
<script type="text/javascript">alert ("This student number is registered already!"); window.location = "submit.php"</script>
<?php
}
else
{
$query = "INSERT INTO tb_sttdinfo VALUES('$stu_id','$fullname','$program','$address','$cno','$pcnum')";
if(mysqli_query($conn,$query)){
?>
<script type="text/javascript">alert ("Thank you, your information is registered!! "); window.location = "qr.html"</script>
<?php
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favcon.png">
	<link rel="stylesheet" href="style.css">
	<title>STUDENT REGISTRATION </title>
</head>
<body>
	<form action="" method="post" autocomplete="off">
<div class="container" >
	<div class="header"> </div>
	<h2 class="upper">REGISTRATION FORM </h2>

	<div class="input-form">
	
	<input type="tel" pattern="[0-9]{2}-[0-9]{5}" class="qr-studnum" placeholder="SN NO. 00-00000" name="stu_id" onkeydown="return/[0-9-\]/i.test(event.key)" maxlength="8" required >
	<br>

	<input type="text" class="cname" placeholder="COMPLETE NAME" name="fullname" onkeydown="return/[A-Z.\]/i.test(event.key)" maxlength="50" required>
	
	<div class="radio-container">
	<input type="radio" id="bsed" class="program" name="program" value="BSED" required>
		<label for="bsed">BSED</label>
	<input type="radio" id="beed" class="program" name="program" value="BEED" required>
		<label for="beed">BSHM</label>
	<input type="radio" id="bshm" class="program" name="program" value="BSHM" required>
		<label for="bshm">BEED</label>
	<input type="radio" id="bsit" class="program" name="program" value="BSIT" required>
		<label for="bsit">BSIT</label>
	</div>
	
	
	<input type="text" class="address" placeholder="ADDRESS" name="address" maxlength="100" required>
	<input type="number" class="stud-num" placeholder="YOUR CONTACT NO." name="cno" maxlength="11" required>
	<input type="number" class="p-num" placeholder="PARENTS CONTACT NO." name="pcnum" maxlength="11" required>
	<input type="submit" name="submit" value="SUBMIT">

<script>
	document.querySelectorAll('input[type="number"]').forEach(input =>{
		input.oninput =() =>{
			if (input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
		};
	});
</script>



</div>
</div>
</form>
</body>
</html>