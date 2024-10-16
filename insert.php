<?php

 $link=mysqli_connect("mysql.hostinger.in","u939418847_shash","Kplionmessi1#","u939418847_shash");
if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){
        $secret = "6LfIQBYTAAAAAGeohJ13vxU34OiN9wHMK5eMdSFH";
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $rsp  = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip";
        $arr = json_decode(file_get_contents($rsp));
        if($arr->{'success'}==false){
                   echo 'Spam';
        }
        
    }
 if(mysqli_connect_errno()){
echo"Error: Could not connect.". mysqli_connect_error();
}

$name=mysqli_real_escape_string($link,$_POST['name']);
$email=mysqli_real_escape_string($link,$_POST['email']);
$comment=mysqli_real_escape_string($link,$_POST['comment']);

$sql="INSERT INTO queries(name,email,comment)
VALUES ('$name','$email','$comment')";
if(!mysqli_query($link,$sql)){
	die("Error: Could not receive,Try again.".mysqli_error($link));

}else{
	echo"Thank You. We'll get back to you shortly.";

}
mysqli_close($link);
?>