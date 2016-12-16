<script>if(localStorage.getItem("loginstatus") != "loggedin"){ 
alert("You Must be Logged in To access this page thanks");
 window.location.assign("login.php");}</script>

<?php
error_reporting(0);
$parkid=$_GET['id'];
$cars=$_GET['cars'];
$maxcars=$_GET['maxcars'];
if($cars==100){ $status="full";}


 ?><center>
 <h1>City parking Tracer</h1>
 <p>Enter cars As They Are Parking</p>
 <form action="addcar.php" method="post">
 <input type="number" id="maxcars" name="maxcars" value="<?php echo $maxcars ?>" readonly hidden="true" />
 <input type="number" id="id" name="id" value="<?php echo $parkid ?>" readonly  hidden="true"/>
Current Cars <input type="number" id="cars" name="cars" value="<?php echo $cars ?>" readonly /><br />
 <input type="number" id="carin" name="carin" /><br />
 <input type="submit" name="submit" value="Save Car">
 
 
 </form>
 <?php if(isset($_POST['submit'])){
	 $id=$_POST['id'];
	 $cars=$_POST['cars'];
	 $carin=$_POST['carin'];
	 $maxcars=$_POST['maxcars'];
	  $newcars=$cars+$carin;
		 if($newcars >$maxcars){ ?><script>alert("Check Car Limit And Tray Again"); window.location.assign("add.php");</script> <?php }else{
	 require_once("connect.php");
	  $db=mysql_select_db("cityparking");
 if(!$db){echo mysql_error();}
 
 $sql=mysql_query("update markers set cars='$newcars' where id='$id'");
 if($sql){
	  ?><script>alert("Cars Updated Successfully"); window.location.assign("add.php");</script><?php
	 }else{
		  echo mysql_error();
		 }
		 }
	 }else{} ?>
 </center>