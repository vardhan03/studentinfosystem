<html>
<head>
<title>Insert</title>
</head>
<body style="background-color:white;">
<?php
$sname="localhost";
$uname="root";
$pwod="1234";
$dbname="student";
$conn=mysqli_connect($sname,$uname,$pwod,$dbname);
if(!$conn){
echo "Database failed to connect";
}
$sql="INSERT INTO stude(st_name,st_mail,st_num,st_cont) VALUES('$_POST[name]','$_POST[mail]',$_POST[rno],$_POST[cont])";
echo $sql;	
if(mysqli_query($conn,$sql)){
//echo "Record inserted succesffully";
//include "dbcon.php";
header("Location:dbcon.php");
   exit;
}
else{
echo "Not recorded";
header("Location:dbcon.php");
}
/*echo '<br>
<form action="dbcon.php">
<input type="submit" value="GOBACK">
</form>';*/
//echo $_POST["name"]."!!!";

?>
</body>
</html>
