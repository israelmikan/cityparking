<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type="text/css">
.bodyy {
	text-align: center;
}
</style>
</head>

<body class="bodyy">
<h2>City Parking Login</h2>
<form id="form1" name="form1" method="post" action="login.php">
  <table width="28%">
    <tr>
      <td>Username</td>
      <td><label for="username"></label>
      <input type="text" name="username" id="username" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>

<?php if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$users="citypark";
	$passy="kampala";
	
	 if($users==$username && $passy==$password){
		  ?> <script>alert("Login Successfull"); localStorage.setItem("loginstatus","loggedin");  window.location.assign("add.php");</script><?php
		  }else{
			 ?> <script>alert("Login Failed"); window.location.assign("login.php");</script><?php
		  echo mysql_error();
			  }
	
	
	require_once("connect.php");
	  $db=mysql_select_db("cityparking");
 if(!$db){echo mysql_error();}
 $sql=mysql_query("select * from users where username='$password' and password='$password'");
  while($row=mysql_fetch_array($sql)){
	  $user=$row['username'];
	  $pass=$row['password'];
	  echo $user;
	  echo $pass;
	 
	  }
	
	}else{
		
		//echo 'no post params';
		} ?>
<p>&nbsp;</p>
</body>
</html>