<html>
<head><meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
#a{
color:green;
}
</style>
<script>
function edit(a,b,c,d){
document.getElementById('naid').value=a;
document.getElementById('maid').value=b;
document.getElementById('rid').value=c;
document.getElementById('conid').value=d;
//alert (a+b+c+d);
}
</script>
</head>
<body style="background-color:lightblue">
<?php
$sname="localhost";
$uname="root";
$pwod="1234";
$dbname="student";
$conn=mysqli_connect($sname,$uname,$pwod,$dbname);
if(!$conn){
echo "Database failed to connect";
}
$limit = 6;  
if (isset($_GET["page"])) 
{ $page=$_GET["page"]; } 
else { $page=1; }  
$start=($page-1)*$limit;  
  
$sql = "SELECT * FROM stude LIMIT $start,$limit";
//echo $sql;
echo "<center><u><h1 id='a'>Database Details</h1></u>";
echo '<center><table border="1" cellspacing="2" cellpadding="2" style="border:3px solid black;" class="table-condensed table-hover"> 
      <tr> 
          <td> <font face="Arial" size="5px" color="rgb(255,215,0)" >Name</font> </td> 
          <td> <font face="Arial" size="5px" color="rgb(255,215,0)">Email</font> </td> 
          <td> <font face="Arial" size="5px" color="rgb(255,215,0)">R-Number</font> </td> 
          <td> <font face="Arial" size="5px" color="rgb(255,215,0)">Contact</font> </td> 
	  <td> <font face="Arial" size="5px" color="rgb(255,215,0)">Delete</font> </td> 
	  <td> <font face="Arial" size="5px" color="rgb(255,215,0)">Edit</font> </td> 	
      </tr>';
//$sql="SELECT * from stude";
$result=mysqli_query($conn,$sql);
$res=mysqli_fetch_row($result);
$que=mysqli_num_rows($result);
if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_assoc($result)){
		$regnum=$row["st_num"];
		$regname=$row["st_name"];
		$regmail=$row["st_mail"];
		$regcont=$row["st_cont"];
	        echo '<tr> 
                  <td style="text-align:center;">'.$row["st_name"].'</td> 
                  <td style="text-align:center;">'.$row["st_mail"].'</td> 
                  <td style="text-align:center;">'.$row["st_num"].'</td> 
                  <td style="text-align:center;">'.$row["st_cont"].'</td>  
		  <td style="text-align:center;">
     	           <form action="del.php" method="POST">
		   <input type="hidden" id="numid" name="numid" value=' .$regnum. '>
                   <input type="submit" value="DELETE" class="btn-info">
		   </form></td>
<td><input type="submit" value="EDIT" onclick=edit("'.$row["st_name"].'","'.$row["st_mail"].'","'.$row["st_num"].'",'.$row["st_cont"].') class="btn btn-primary" data-toggle="modal" data-target="#myMod" ></input><br><br></td>		
              </tr>';
              /* echo '<form action="edit.php" method="POST">
	           <input type="hidden" id="nid" name="nid" value=' .$regnum.'>';*/
		
	}
	
}
else{
 echo "0";
}
echo '</table>';
echo '<br><br>';
/*echo '<button type="button" data-toggle="modal" data-target="#myId">ADD MORE DETAILS</button>';
echo '<div class="modal" id="myId">
     */?>
      
<input type="submit" value="ADD MORE STUDENT DETAILS" class="btn btn-primary" data-toggle="modal" data-target="#myModal"></input><br><br>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Student Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
	<form action="insert.php" method="POST" style="background-color:lightblue;">
        Fisrt Name: <input type="text" name="name"><br>
	Email: <input type="email" name="mail"><br>
	Registration Number : <input type="number" name="rno"><br><br>
	Contact Number      : <input type="number" name="cont"><br><br>
	<input type="submit" value="SUBMIT">
	<input type="reset" value="RESET"></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

   </div>
  </div>
</div>
<?php
$que= "SELECT COUNT(*) FROM stude";  
$rs_result= mysqli_query($conn,$que);  
$ro= mysqli_fetch_row($rs_result);  
$total= $ro[0];  
$total_pages= ceil($total / $limit);  
$pagLink="<div class='pagination pagination-sm'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='dbcon.php?page=".$i."'>".$i ."</a>"; 
};  
echo $pagLink . '</div>';  

?>

<div class="modal" id="myMod">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Student Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
	<form action="edit.php" method="POST" style="background-color:lightblue;">
        Fisrt Name: <input type="text" name="name" id="naid"><br>
	Email: <input type="email" name="mail" id="maid"><br>
	Registration Number : <input type="number" name="rno" id="rid" readOnly><br><br>
	Contact Number      : <input type="number" name="cont" id="conid"><br><br>
	<input type="submit" value="SUBMIT">
	<input type="reset" value="RESET"></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

   </div>
  </div>
</div>
</body>
</html>
