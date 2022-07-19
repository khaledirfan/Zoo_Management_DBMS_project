<?php
  session_start();
  $wrongInfo = false;
  $conn = oci_connect('zoo_management', 'oracle12345', 'localhost/xe')
  or die(oci_error());

  if(!$conn){
    echo "not connected";
  }else{
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $_SESSION['uname']= $username;
      $_SESSION['profile'] = $username;      
      $sql = "select * from user_info  where username='$username' and password='$password'";
      $stid=oci_parse($conn, $sql);
      $r=oci_execute($stid);
      $row= oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
      if($row==NULL){
        $sql = "select * from admin_info where username= '$username' and password= '$password'";
        $stid=oci_parse($conn, $sql);
        $r=oci_execute($stid);
        $row= oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
        if($row!=NULL){
          header("Location: admin.php");
        }else{
          $wrongInfo=true;
        }
      }else{
        header("Location: user.php");
      }
    }
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="login.css">
  <link rel="icon" type="image/x-icon" href="/img/zoo.ico">
  <!-- <link rel="stylesheet/scss" href="login.scss"> -->
</head>
<body>
  <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<div class="content">
 <div class="panda">
  <div class="ear"></div>
  <div class="face">
    <div class="eye-shade"></div>
    <div class="eye-white">
      <div class="eye-ball"></div>
    </div>
    <div class="eye-shade rgt"></div>
    <div class="eye-white rgt">
      <div class="eye-ball"></div>
    </div>
    <div class="nose"></div>
    <div class="mouth"></div>
  </div>
  <div class="body"> </div>
  <div class="foot">
    <div class="finger"></div>
  </div>
  <div class="foot rgt">
    <div class="finger"></div>
  </div>
</div>
 <form action="login.php" method="post">
  <div class="hand"></div>
  <div class="hand rgt"></div>
  <h1>Login</h1>
  <div class="form-group">
    <input required="required" class="form-control" id="username" name="username"/>
    <label class="form-label">Username    </label>
  </div>
  <div class="form-group">
    <input id="password" type="password" required="required" class="form-control" id="password" name="password"/>
    <label class="form-label">Password</label>
    <p class="alert">Invalid Credentials..!!</p>
   <div class="text-center"><button type="submit" class="btn btn-primary btn-block">Login</button></div>
  </div>
</form>
</div>
<script src="login.js"></script>
</body>
</html>