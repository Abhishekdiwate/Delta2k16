<?
session_start();
include_once 'db_connect.php';
$error=false;
if (isset($_POST['submit'])) {
	$con = mysqli_connect("localhost", "root", "", "login") or die("Error " . mysqli_error($con));

	$email=mysqli_real_escape_string($con,$_POST['email']);
	$old_password=mysqli_real_escape_string($con,$_POST['old']);
	$new_password=mysqli_real_escape_string($con,$_POST['new']);
	$new_passwordc=mysqli_real_escape_string($con,$_POST['newc']);
	$old=md5($old_password); 
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
	
	if($new_password!=$new_passwordc)
	{
		$error=true;
	$passc_error="password doesnt match";
	}
	if(strlen($new_password)<6){
		$error=true;
		$pass_error="password shouldbe more then 6 characters";
	}
	if($result = mysqli_query($con, "SELECT * FROM diwate WHERE email = '" . $email. "'"));
	{
	if($row = mysqli_fetch_array($result)){
	$old_db=$row['password'];
	if($old!=$old_db)
	{
		$error=true;
	$old_error= "old passoword doesnt match";
	}
	mysqli_free_result($result);
	
	}
	}
	
	if(!$error){
	if($result=mysqli_query($con,"UPDATE diwate SET password='".md5($new_password)."' WHERE email='".$email."'"))
	{
		$successmsg= "password has been changed";
	}else{
		$errormsg="error in updating";
	}
}
}

		?>
<html
<head>
    <title>password change script</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">Login</a></li>
                <li class="active"><a href="register.php">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="password change form">
                <fieldset>
                    <legend>password change</legend>

                     <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Email" required class="form-control" />
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">old password</label>
                        <input type="password" name="old" placeholder="password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($old_error)) echo $old_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">new password</label>
                        <input type="password" name="new" placeholder="Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($pass_error)) echo $pass_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="newc" placeholder="Confirm Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($passc_error)) echo $passc_error; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
			<span class="text danger"><?php if(isset($errmsg)){echo $errmsg;}?></span>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    
		
	
	
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

