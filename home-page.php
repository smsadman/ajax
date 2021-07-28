<?php 
	session_start();
	$userId = isset($_SESSION['uid']) ? $_SESSION['uid'] : ""; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
</head>
<body>

	<h1>Welcome, <?php echo $userId; ?></h1

<head>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","registered_information.php?q="+str,true);  
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
<option value="">users list :</option>
<option value="1"> user </option>

</select>
</form>
<br>
<div id="txtHint"><b>user info will be listed here.</b></div>

</body>
</html>

	<p>Click here to <a href="logout.php">Logout</a></p>

</body>
</html>
