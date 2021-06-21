<!DOCTYPE html>
<html>

<head>
<!-- <style>
.error {
    color: #FF0000;}
</style> -->
</head>

<body>

<h2 style="color:black">Registration Form</h2>
<span style="color:#FF0000">* Required field</span>
<br><br>
<?php $fname=$lname=$email=$dob=$praddress=$username=$password=$peaddress=$phone=$religion=$website=$gender="";
$nameErr=$dobErr=$fnameErr=$lnameErr=$religionErr=$passwordErr=$usernameErr=$genderErr=$webErr=$emailErr="";

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty($_POST['fname'])){
        $fnameErr="First name field required";
    }else{
      $fname=test_function($_POST['fname']);
      if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
        $fnameErr="Only letters and white space allowed";
      }
      }

    if(empty($_POST['username'])){
        $usernameErr="Username field required";
    }else{
      $username=test_function($_POST['username']);
      }

    if(empty($_POST['password'])){
        $passwordErr="Password field required";
    }else{
      $password=test_function($_POST['password']);
      }

    if(empty($_POST['lname'])){
        $lnameErr="Name field required";
    }else{
      $lname=test_function($_POST['lname']);
      if(!preg_match("/^[a-zA-Z ]*$/",$lname)){
        $lnameErr="Only letters and white space allowed";
      }
      }

    if(empty($_POST['dob'])){
      $dobErr="Birth date required";
    }else{
      $dob=test_function($_POST['dob']);
    }

    if(!empty($_POST['phone'])){
      $phone=test_function($_POST['phone']);}

    if(!empty($_POST['peaddress'])){
      $peaddress=test_function($_POST['peaddress']);}

    if(!empty($_POST['praddress'])){
      $praddress=test_function($_POST['praddress']);}


    if(empty($_POST['religion'])){
      $religionErr="Religion required";
    }else{
      $religion=test_function($_POST['religion']);
    }

    if(empty($_POST['email'])){
        $emailErr="Email field required";
    }else{
      $email=test_function($_POST['email']);
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr="Invalid email format";
      }
      
      }


    if(empty($_POST['comment'])){
        $comment="";
    }else{
      $comment=test_function($_POST['comment']);}


    if(empty($_POST['website'])){
        $website="";
    }else{
      $website=test_function($_POST['website']);
      if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
        $webErr = "Invalid URL";
      }
    
    }
      
    if(empty($_POST['gender'])){
        $genderErr="Gender field required";
    }else{
      $gender=test_function($_POST['gender']);}
}

function test_function($data){

  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
<fieldset>
<legend>Basic Information:</legend>
 First Name:<input type="text" name="fname" value="<?php echo $fname;?>">
 <span style="color:#FF0000">* <?php echo $fnameErr;?></span>
 <br>
 <br>
 Last Name:<input type="text" name="lname" value="<?php echo $lname;?>">
 <span style="color:#FF0000">* <?php echo $lnameErr;?></span>
 <br>
 <br>
 Date of Birth:<input type="date" name="dob" value="<?php echo $dob;?>">
 <span style="color:#FF0000">* <?php echo $dobErr;?></span>
 <br>
 <br>
 Religion:<select name="religion" id="religion">
            <option <?php if (isset($religion) && $religion=="islam") echo "checked";?> value="islam">Islam</option>
            <option <?php if (isset($religion) && $religion=="hinduism") echo "checked";?> value="hinduism">Hinduism</option>
            <option <?php if (isset($religion) && $religion=="buddism") echo "checked";?> value="buddhism">Buddhism</option>
            <option <?php if (isset($religion) && $religion=="christianity") echo "checked";?> value="christianity">Christianity</option>
            <option <?php if (isset($religion) && $religion=="other") echo "checked";?> value="other">Other</option>
          </select>
          <span style="color:#FF0000">* <?php echo $religionErr;?></span>
          <br>
          <br>
  Gender:<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
        <span style="color:#FF0000">*<?php echo $genderErr;?></span>
</fieldset>

<fieldset>
<legend>Contact Information:</legend>
Permanent Address:<input type="textarea" id="peaddress" name="peaddress" value="<?php echo $peaddress;?>">
<br>
<br>
Present Address:<input type="textarea" id="praddress" name="praddress" value="<?php echo $praddress;?>">
<br>
<br>
Phone:<input type="tel" id="phone" name="phone" value="<?php echo $phone;?>">
<br>
<br>
 Email:<input type="text" name="email" value="<?php echo $email;?>">
 <span style="color:#FF0000">* <?php echo $emailErr;?></span>
  <br>
  <br>
 Website:<input type="text" name="website" value="<?php echo $website;?>">
 <span style="color:#FF0000"> <?php echo $webErr;?></span>
  <br>
  <br>
</fieldset>

<fieldset>
<legend>Account Information:</legend>
Username:<input type="text" id="username" name="username" value="<?php echo $username;?>">
<span style="color:#FF0000"> *<?php echo $usernameErr;?></span>
<br>
<br>
Password:<input type="password" id="password" name="password" value="<?php echo $password;?>">
<span style="color:#FF0000"> *<?php echo $passwordErr;?></span>
<br>
<br>
</fieldset>
        <br>
        <br>
<input type="submit" name="submit" value="Register">
</form>


</body>
</html>