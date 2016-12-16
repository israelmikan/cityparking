<script>if(localStorage.getItem("loginstatus") != "loggedin"){ 
alert("You Must be Logged in To access this page thanks");
 window.location.assign("login.php");}</script>
</head>
<?php
error_reporting(0);
$parkid=$_GET['id'];
 require_once("connect.php");
	  $db=mysql_select_db("cityparking");
 if(!$db){echo mysql_error();}
 $sql=mysql_query("delete from markers where id='$parkid'");
 if($sql){
	 ?><script>alert("Perking Space Deleted Successfully"); window.location.assign("add.php");</script><?php
	 
	 }else{
	 
	 }


?>