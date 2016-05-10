<?php include 'header.php';?> 
    
<center>
    <h2 id="broughtDown">GIVE US A CALL!</h2>
    <div id="contactInfo">
        <h3><i class="fa fa-phone-square" aria-hidden="true"></i>(786) 395-2111</h3>
        <h3><i class="fa fa-phone-square" aria-hidden="true"></i>(786) 477-3886</h3>
    </div>
    <h2 id="address">3601 Northwest 81st Street<br>
        Miami, FL 33147</h2>
    <img src="img/map.png">
    <h2><u style="color:white">Hours:</u></h2>
<h2>Mon-Sat: 9:30am - 5:30pm </h2>
<h2>Sunday: 11am - 4pm</h2>
</center>
        
<?php
// define variables and set to empty values
$nameErr = $emailErr = $subjectErr = "";
$fullname = $email =  $subject = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fullname"])) {
    $nameErr = "*Full name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "*Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "*Invalid email format"; 
    }
  }
    
    if (empty($_POST["subject"])) {
    $subjectErr = "*Subject is required";
  } else {
    $subject = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($subject, FILTER_VALIDATE_EMAIL)) {
      $subjectErr = "*Subject field needs to be used"; 
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	          <div class="box">
	            <center><h1>Contact Us!</h1></center>
	            <label>
	               <span>Full Name :</span>
	               <input type="text" class="input_text" name="name" id="name" value="<?php echo $fullname;?>"/>
	            </label>
                  <span class="error"><?php echo $nameErr;?></span>
	             <label>
	               <span>Email :</span>
	               <input type="text" class="input_text" name="email" id="email" value="<?php echo $email;?>"/>
	            </label>
                  <span class="error"><?php echo $emailErr;?></span>
	             <label>
	                <span>Subject :</span>
	                <input type="text" class="input_text" name="subject" id="subject" value="<?php echo $subject;?>"/>
	            </label>
                  <span class="error"><?php echo $subjectErr;?></span>
	            <label>
	                <span>Message :</span>
	                <textarea class="message" name="feedback" id="feedback"></textarea>
                 <input type="submit" class="button" value="Submit"/>
              
	            </label>
	        </div>
	    </form>
        <center><h4>Check us out on FACEBOOK! <a href="https://www.facebook.com/gmarfurniture"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    </h4></center>

    </body>
</html>