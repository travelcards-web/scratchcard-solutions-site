<?php
// Added to top and bottom so header() redirect will work.
// Still need to sort out back button!
ob_start();
?>
<!DOCTYPE html>
<!-- saved from url=(0037)http://www.scratchcard-solutions.com/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Scratchcard Solutions Ltd</title>
<meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=0.8, user-scalable=no">
<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<style>
body {margin:auto; text-align:center;
	font-family: Arial, Helvetica, sans-serif;
}
p {
	font-size:16px;
	color:#000000;
	line-height: 20px;
}
h3 {
	color: #5A5A5A;
}
#wrapper{
	position:absolute;
	padding:0px 0px 0px 0px;
	font-size: 0;
	line-height: 0;
	width: 80%;
	top: 10%;
	left:10%;
	margin-bottom: 10%;
}
#wrapper-inner {
	max-width: 900px;
    height: 100%;
    margin: auto;
}
#header-wrapper {
    position: relative;
    min-height: 70px;
    height: 70px;
}
.main {
	display: inline-block;
	vertical-align: top;
	height: 100%;
}
#footer {
	background-color: #000;
}
#main-left {
	width: 65%;
	background-color: #000;
}
#main-left:after {
    content: '';
    position: absolute;
    border-right: 110px solid #000;
    height: 100%;
    transform: skewX(-5deg);
    left: 60%;
    top: 0;
}
#main-right {
	width: 35%;
	background-image: url("img/main-puzzle.jpg");
	background-color: #cccccc;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}
.p-title {
	color:#fff;
	font-size: 24px;
	position: relative; 
}
.h2 {
	font-size: 24px;
	line-height: 30px;
	color:#fff;
}
.content {
	font-size: 16px;
	line-height: 18px;
	text-align: left;
	padding: 3%;
	max-width: 80%;
	margin: auto;
}
.mailto-link {
	color: #000;
	text-decoration: none;
}
.mailto-link:hover {
	text-decoration: underline;
}
.footer-p {
	color: #fff;
    padding: 1em;
    margin: 0;
    font-size: 14px;

}
.footer-link {
	color: #fff;
	text-decoration: none;
}
.footer-link:hover {
	text-decoration: underline;;
}

.real_data{
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    font-size: 0;
    line-height: 0;
}

@media only screen and (max-width: 700px) {
	#wrapper {
		top:0;
		width: 100%;
		left: 0%;
		margin-bottom: 0;
	}
	#main-right {
		display: none;
	}
	#main-left {
		width: 100%;
	}
	#main-left:after {
		display: none;
	}
	.footer-link-separator {
		display: none;
	}
	.footer-link,
	.footer-span {
		display: block;
		padding: 10px 0 0 0;
	}
	.footer-p {
		padding: 1.5em 0 1.5em 0;
	}
}


/* Specific to this page */
.form {
	padding: 15px 0 15px 0;
}

.input {
	padding: 8px;
	width: 50%;
    margin-left: 25%;
}

.error {
	display: block;
	margin: 0 0 15px 25%;
	min-height: 12px;
}

.error,
.asterix {
	color: #EC7063;
	font-size: 14px;
}

.submit {
	background-color: #000;
	padding: 5px 10px;
	color: #fff;
    margin: 10px 0 0 25%;
}

.submit:hover {
	background-color: #424949;
	cursor: pointer;
}

.submit:focus {
	color: #D0D3D4;
}

@media only screen and (max-width: 700px) {

	.input {
	    margin-left: 0;
	    width: 90%;
	    padding: 10px;
	    font-size: 20px;
	}

	.submit {
		margin-left: 2%;
		padding: 10px 15px;
		font-size: 20px;
	}

	.error {
		margin-left: 2%;
	}

	.asterix {
	font-size: 28px;
	}

	.form {
		padding: 25px 0 25px 0;
	}

}

</style>
</head>
<body>
<div id="wrapper">
	<div id="wrapper-inner">
		<div id="header-wrapper">
			<div id="main-left" class="main">
				<h2 class="h2">Contact Us</h2>
			</div>
			<div id="main-right" class="main"></div>
		</div>
		<div class="content">

			<?php
				// define variables and set to empty values
				$firstNameErr = $lastNameErr = $emailErr = "";
				$first_name = $last_name = $email = $comment = "";
				$passCheck = 0;

				if ($_SERVER["REQUEST_METHOD"] == "POST") {

				  if (empty($_POST["first_name"])) {
				    $firstNameErr = "First Name is required";
				  } else {
				    $first_name = test_input($_POST["first_name"]);
				    // check if name only contains letters and whitespace
				    if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
				      $firstNameErr = "Only letters and white space allowed";
				    } else {
				    	$passCheck++;
				    }
				  }

				  if (empty($_POST["last_name"])) {
				    $lastNameErr = "Last Name is required";
				  } else {
				    $last_name = test_input($_POST["last_name"]);
				    // check if name only contains letters and whitespace
				    if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
				      $lastNameErr = "Only letters and white space allowed";
				    } else {
				    	$passCheck++;
				    }
				  }

				  if (empty($_POST["email"])) {
				    $emailErr = "Email is required";
				  } else {
				    $email = test_input($_POST["email"]);
				    // check if e-mail address is well-formed
				    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				      $emailErr = "Invalid email format";
				    } else {
				    	$passCheck++;
				    }
				  }

				  if (empty($_POST["comment"])) {
				    $comment = "";
				  } else {
				    $comment = test_input($_POST["comment"]);
				  }

				  if ($passCheck === 3) {

				  	$subject = '';
				  	$message = "<b>First Name: </b>" . $first_name . "<br>";
				  	$message .= "<b>Last Name: </b>" . $last_name . "<br>";
				  	$message .= "<b>Email: </b>" . $email . "<br>";
				  	$message .= "<b>Message: </b>" . $comment . "<br>";

					if (!empty($_POST["name_one"]) || !empty($_POST["email_one"])) {
						// echo "Fail honeypot";
						$subject = "SUSPECT SPAM: ";
						$message .= "<b>Suspect Data: </b><pre>" . test_input($_POST["name_one"]) . "<br>*** *** ***<br>" . test_input($_POST["email_one"]) . "</pre><br>";
					}

					$subject .= 'Scratchcard Solutions Contact Request';
					sendEmail($subject,$message);

					//Re-direct to thank-you page
					header("Location: {$_SERVER['HTTP_ORIGIN']}/thank-you.php");
				  }

				}//end POST check

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}

				function sendEmail($subject, $message) {
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					mail("dgabrahams@aol.com",$subject,$message,$headers);
					mail("jo@scratchcard-solutions.com",$subject,$message,$headers);
				}

			?>

	        <?php if ($passCheck === 3): ?>
	        <?php else: ?>
	        <?php endif; ?>

			<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			  <input class="input" type="text" name="first_name" id="first_name" value="<?php echo $first_name;?>" placeholder="First Name">
			  <span class="asterix">*</span>
			  <span class="error"><?php echo $firstNameErr;?></span>
			  <input class="input" type="text" name="last_name" value="<?php echo $last_name;?>" placeholder=" Last Name">
			  <span class="asterix">*</span>
			  <span class="error"><?php echo $lastNameErr;?></span>
			  <input class="input" type="text" name="email" value="<?php echo $email;?>" placeholder="Email">
			  <span class="asterix">*</span>
			  <span class="error"><?php echo $emailErr;?></span>
			  <textarea class="input" name="comment" rows="5" cols="40" placeholder="Message"><?php echo $comment;?></textarea>

			  <label class="real_data" for="name_one"></label>
			  <input class="real_data" autocomplete="off" type="text" id="name_one" name="name_one" placeholder="Your name here">
			  <label class="real_data" for="email_one"></label>
			  <input class="real_data" autocomplete="off" type="email" id="email_one" name="email_one" placeholder="Your e-mail here">

			  <input class="submit" type="submit" name="submit" value="Submit">
			</form>
			<script type="text/javascript">
				//Set the focus on load to the first form element.
				document.getElementById("first_name").focus();
			</script>

		</div>
		<div id="footer">
			<p class="footer-p">
				&#9400; Scratchcard Solutions Ltd. <span class="footer-span">All Rights Reserved.</span><span class="footer-link-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a class="footer-link" href="contact-us.php" target="_top">Contact Us</a><span class="footer-link-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a class="footer-link" href="privacy-policy.html" target="_top">Privacy Policy</a>
			</p>
		</div>
	</div>
</div>

</body></html>
<?php
ob_end_flush();
?>