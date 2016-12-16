<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage parkings</title>
<script>if(localStorage.getItem("loginstatus") != "loggedin"){ 
alert("You Must be Logged in To access this page thanks");
 window.location.assign("login.php");}</script>
</head>

<body>
<center><h1>City parking Tracer</h1>
<form action="add.php" method="post">
  <table width="59%" height="152" border="0">
    <tr>
      <td width="36%">Name</td>
      <td width="64%"><label for="name"></label>
        <input type="text" name="name" id="name" required="required" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="address"></label>
        <input type="text" name="address" id="address" required="required" /></td>
    </tr>
    <tr>
      <td>latitude</td>
      <td><label for="latitude"></label>
        <input type="text" name="latitude" id="latitude"  required="required"/></td>
    </tr>
    <tr>
      <td>Longitude</td>
      <td><label for="longitude"></label>
        <input type="text" name="longitude" id="longitude" required="required" /></td>
    </tr>
    <tr style="">
      <td>Max Cars</td>
      <td><label for="maxcars"></label>
        <input type="maxcars" name="maxcars" id="maxcars" value="" /></td>
    </tr>
    <tr style="visibility:hidden">
      <td>Status</td>
      <td><label for="status"></label>
        <input type="text" name="status" id="status" value="empty" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Save" /></td>
    </tr>
  </table>
  <br />
  <script>function Logout(){
	  localStorage.removeItem("loginstatus");
	  alert("Successfully Logged Out");
	  
	  }</script>
  </form>
    <a href="index.php">
  <h3">View Parkings</h3>
  </a>||
  <a href="">
  <h3 onclick="Logout();">Logout</h3>
  </a>
  <?php
  if(isset($_POST['submit'])){
	  $name=$_POST['name'];
	  $address=$_POST['address'];
	  $latitude=$_POST['latitude'];
	  $longitude=$_POST['longitude'];
	  $maxcars=$_POST['maxcars'];
	  $type="bar";
	  require_once("connect.php");
	  $db=mysql_select_db("cityparking");
 if(!$db){echo mysql_error();}

	  $sql=mysql_query("INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `status`, `cars`, `maxcars`) VALUES ('', '$name', '$address', '$latitude', '$longitude', '$type', 'empty', '0', '$maxcars');");
	  if($sql){
		  ?><script>alert("Parking Lane Saved Successfully");window.location.assign("index.php");</script><?php
		  }else{
		  ?><script>alert("OOOPs Something happened");</script><?php
		  echo mysql_error();
		  }
	  
	  
	  }else{
		 // echo 'no values';
		  
		  }
  
  
   ?>
  
<table width="100%" border="1">
  <tr style="background-color:black; color:white;">
    <td>Parking name</td>
    <td>Address</td>
    <td>Latitude</td>
    <td>Longitude</td>
    <td>Carsin</td>
     <td>Max Cars</td>
    <td>Status</td>
    <td>Action</td>
  </tr>
  <?php 
   require_once("connect.php");
	  $db=mysql_select_db("cityparking");
 if(!$db){echo mysql_error();}
  $sql=mysql_query("select * from markers");
  while($row=mysql_fetch_array($sql)){
	  ?>  <tr>
	  <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['lat']; ?></td>
    <td><?php echo $row['lng']; ?></td>
    <td><?php echo $row['cars']; ?></td>
     <td><?php echo $row['maxcars']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><a href="addcar.php?id=<?php echo $row['id'] ?>&cars=<?php echo $row['cars'] ?>&maxcars=<?php echo $row['maxcars'] ?>">Add Car </a>|| <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td> </tr>
	  <?php
	  }
  
  ?>
  
  
</table>

</center>
</body>
</html>