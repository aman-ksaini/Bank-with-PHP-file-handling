<html>

<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/Cust_reg.css" />

	<?php include 'header.php'; ?>
</head>

<body>
	<div class="container_regfrm_container_parent">
		<h3>Online Account Opening Form</h3>
		<div class="container_regfrm_container_parent_child">
			<form method="post">
				<input type="text" name="name" placeholder="Name" required />
				<select name="gender" required>
					<option class="default" value="" disabled selected>Gender</option>
					<option value="Male" required>Male</option>
					<option value="Female">Female</option>
					<option value="Others">Others</option>
				</select>
				<input type="text" name="mobile" placeholder="Mobile no" required />
				<input type="text" name="email" placeholder="Email id" />
				<input class="address" type="text" name="homeaddrs" placeholder="Home Address" required />
				<input type="text" name="country" placeholder="INDIA" value="INDIA	" readonly="readonly" />



				<select name="state" required>
					<option value="Andhra Pradesh">Andhra Pradesh</option>
					<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Assam">Assam</option>
					<option value="Bihar">Bihar</option>
					<option value="Chandigarh">Chandigarh</option>
					<option value="Chhattisgarh">Chhattisgarh</option>
					<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
					<option value="Daman and Diu">Daman and Diu</option>
					<option value="Delhi">Delhi</option>
					<option value="Lakshadweep">Lakshadweep</option>
					<option value="Puducherry">Puducherry</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="Jammu and Kashmir">Jammu and Kashmir</option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Karnataka">Karnataka</option>
					<option value="Kerala">Kerala</option>
					<option value="Madhya Pradesh">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Manipur">Manipur</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Odisha">Odisha</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Tamil Nadu">Tamil Nadu</option>
					<option value="Telangana">Telangana</option>
					<option value="Tripura">Tripura</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="Uttarakhand">Uttarakhand</option>
					<option value="West Bengal">West Bengal</option>
				</select>



				<select name="city" required>
					<option value="">Select City</option>
					<option value="Alipur">Alipur</option>
					<option value="Bawana">Bawana</option>
					<option value="Central Delhi">Central Delhi</option>
					<option value="Delhi">Delhi</option>
					<option value="Deoli">Deoli</option>
					<option value="East Delhi">East Delhi</option>
					<option value="Karol Bagh">Karol Bagh</option>
					<option value="Najafgarh">Najafgarh</option>
					<option value="Nangloi Jat">Nangloi Jat</option>
					<option value="Narela">Narela</option>
					<option value="New Delhi">New Delhi</option>
					<option value="North Delhi">North Delhi</option>
					<option value="North East Delhi">North East Delhi</option>
					<option value="North West Delhi">North West Delhi</option>
					<option value="Pitampura">Pitampura</option>
					<option value="Rohini">Rohini</option>
					<option value="South Delhi">South Delhi</option>
					<option value="South West Delhi">South West Delhi</option>
					<option value="West Delhi">West Delhi</option>

				</select>




				<input type="text" name="pin" placeholder="Pin Code" required />


				<select name="acctype" required>
					<option class="default" value="" disabled selected>Account Type</option>
					<option value="Saving">Saving</option>
					<option value="Current">Current</option>
				</select>
				<input type="password" name="pass1" placeholder="Password" required />
				<input type="password" name="pass2" placeholder="Confirm Password" required />
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>

	<?php include 'footer.php'; ?>

</body>

</html>


<?php

if (isset($_POST['submit'])) {

	$cust_name = $_POST['name'];
	$cust_gender = $_POST['gender'];
	$cust_mobile = $_POST['mobile'];
	$cust_email = $_POST['email'];
	$cust_country = $_POST['country'];
	$cust_state = $_POST['state'];
	$cust_city = $_POST['city'];
	$cust_pin = $_POST['pin'];
	$cust_acctype = $_POST['acctype'];
	$cust_pass1 = $_POST['pass1'];
	$cust_pass2 = $_POST['pass2'];

	// header('location:cust_regfrm_confirm.php');
	if ($cust_pass1 != $cust_pass2) {
		echo '<script>alert("Password do not match")</script>';
	}

	date_default_timezone_set("Asia/Calcutta"); 
    $tdy =date("Y-m-d h:i:sa");
	$fmob = substr($cust_mobile, 0, 4);
	$fname = substr($cust_name, 0, 4);
	$dir = $fmob . "_" . $fname;
	if (!file_exists('./data/' . $dir)) {
		mkdir(('./data/' . $dir), 0755, true);
		$f = fopen('./data/' . $dir . '/details.txt', 'w');
		fwrite($f, $cust_name. "," . $cust_gender. "," . $cust_mobile. "," . $cust_email. "," . $cust_country. "," . $cust_state. "," . $cust_city. "," . $cust_pin. "," . $cust_acctype);
		$f = fopen('./data/' . $dir . '/login.txt', 'w');
		fwrite($f, $cust_email. "," . $cust_pass1);
		$f = fopen('./data/' . $dir . '/transaction.txt', 'w');
		fwrite($f,$tdy.","."TID".rand().","."Account open".","."_".","."_".","."0".",");

		echo  '<script>alert("Application submitted successfully")
			location="index.php"</script>';
	} 
	

}


?>