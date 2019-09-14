<html>
<head>
<title>
Registration form</title>
<style>
.form1{
float:center;
text-align:center;
margin-left:40px;
padding:50px;
border: 2px solid black;
}

</style>
</head>
<body style="background-color:lightblue;">
<h1 style="text-align:center;">Student Details</h1>
<div class="form1">

<form action="edit.php" method="POST">
Fisrt Name: <input type="text" name="name" value="<?php echo $_POST['nameid'];?>"><br>
Email: <input type="email" name="mail" value="<?php echo $_POST['mailid'];?>"><br>
Registration Number : <input type="number" name="rno" value="<?php echo $_POST['numbid'];?>" readOnly><br><br>
Contact Number      : <input type="number" name="cont" value="<?php echo $_POST['contid'];?>"><br><br>
<input type="submit" value="SUBMIT">
<input type="reset" value="RESET">
</form>

</div>
</form></div>

</body>
</html>
 <!--Enter password      : <input type="password" name="pword"><br><br>
<fieldset>
<legend> Gender </legend>

<input type="radio" value="male">  Male<br>
<input type="radio" value="female">Female<br>
</fieldset>
<br>
<br>-->
