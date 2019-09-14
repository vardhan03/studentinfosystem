
<?php
echo 'ok';
$sname="localhost";
$uname="root";
$pwod="1234";
$dbname="student";
echo $sname;
$conn=mysqli_connect($sname,$uname,$pwod,$dbname);
if(!$conn){
echo "Database failed to connect";
}
//$numb=$_POST['nid'];
/*echo $_POST['name'];
echo $_POST['mail'];
echo $_POST['rno'];
echo $_POST['cont'];
$numb=$_POST['rno'];
echo "<br>";*/
//echo $numb."!!!";
$sql="UPDATE stude SET st_name='$_POST[name]',st_mail='$_POST[mail]',st_cont=$_POST[cont] WHERE st_num=$_POST[rno]";
//echo $sql;
if(mysqli_query($conn,$sql)){
//echo "Record updated succesffully";
//include "dbcon.php";
   header("Location:dbcon.php");
   exit;
}
else{
echo "Not Updated";
}
/*echo '<br>
<form action="dbcon.php">
<input type="submit" value="GOBACK">
</form>';*/
//echo $_POST["name"]."!!!";*/

?>

