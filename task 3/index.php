<?php
function display_html($email,$password)
 {
    
	 $con = mysqli_connect("localhost", "root", "", "login") or die("Error " . mysqli_error($con));
    $result = mysqli_query($con, "SELECT * FROM diwate WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
	if($row=mysqli_fetch_array($result))
{$picture=$row['image_name'];
	$username=$row['username'];
	$email=$row['email'];
	echo "HI.$username<br>";
        echo"Your email is.$email<br>";
 echo"<img src='".$picture."'width=100 height=100>";
	
}
}
?>
