<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Login Here</h2>
    <?php
    define("filepath", "data.txt");
    $fileData = read();
    $username=$password=$usernameErr=$passwordErr=$welcome="";

    if(empty($_POST['username'])){
        $usernameErr="Username field required";
    }else{
      $username=$_POST['username'];
      }

      if(empty($_POST['password'])){
        $passwordErr="Password field required";
    }else{
      $password=$_POST['password'];
      }

    $arr = json_decode($fileData, true);

    foreach($arr as $key => $value) {
        if($key==$username && $value=$password){
            $welcome='<iframe src="iframe.html" height="200" width="300" title="Iframe Example"></iframe>';
            }
      }

    function read() {
        $file = fopen(filepath, "r");
        $fz = filesize(filepath);
        $fr = "";
        if($fz > 0) {
        $fr = fread($file, $fz);
        }
        fclose($file);
        return $fr;
        }

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <fieldset>
    <legend>Login</legend>
    
    Username:<input type="text" id="username" name="username" value="">
    <span style="color:#FF0000"> *<?php echo $usernameErr;?></span>
    <br>
    <br>
    Password:<input type="password" id="password" name="password" value="">
    <span style="color:#FF0000"> *<?php echo $passwordErr;?></span>
    </fieldset>
    <br>
    <br>
    <input type="submit" name="login" value="Login">
    <?php echo $welcome; ?>
    <a href="form-submission.php">Registration</a>

    </form>
</body>
</html>