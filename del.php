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
$numb=$_POST['numid'];
//echo $numb."@@@";
$sql="DELETE FROM stude WHERE st_num=$numb";
if(mysqli_query($conn,$sql)){
//echo "Record deleted succesffully";
//include "dbcon.php";
header("Location:dbcon.php");
   exit;
}
else{
echo "not deleted";
}
/*echo '<br>
<form action="dbcon.php">
<input type="submit" value="GOBACK">
</form>';*/
//echo $_POST["name"]."!!!";

?>
</body>
</html>
