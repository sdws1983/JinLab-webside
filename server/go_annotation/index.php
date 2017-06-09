<!DOCTYPE HTML>
<html>

<head>
<title>Welcome to JinLab</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" 
  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
#div1, #div2
#header {
    background-color:gray;
    color:white;
    text-align:center;
    padding:5px;
}
body
{
font-size:70%;
font-family:Georgia,Microsoft YaHei,'宋体' , Tahoma, Helvetica, Arial, "\5b8b\4f53", sans-serif;
}
</style>
  <link rel="shortcut icon" href="/scoure/photos/love.png">
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				<h1>
					GO annotation search
				</h1>
			</div>
			<dd>
			<br />
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Gene id:
<br />
<textarea name="id" rows="5" cols="40"><?php if(isset($_POST['id'])){echo $_POST['id'];}?></textarea>
   <br><br>
<input type="radio" name="species"
<?php if(isset($_POST['species']) && $_POST['species']=="maize") echo "checked=checked;"?>
value="maize" checked>Zea mays
</br>
<input type="radio" name="species"
<?php if(isset($_POST['species']) && $_POST['species']=="GO_id") echo "checked=checked;"?>
value="GO_id">GO id
   <br><br>
<input type="submit" class="btn btn-default" name="submit" value="submit"> 
</form>
<br />
<?php
function parse_name($tmp,$species){
$name = "";
$name = $tmp;
    $mysqli = new mysqli("localhost", "root", "jinlab208-4249", "Zma");  
    if(mysqli_connect_error())  {  
        echo"database error";  
    }else{  
        //echo"php env successful";
        //echo "<dt>search results:</dt>";  
    }
	$myword = "SELECT * FROM GO_annotation " . "WHERE " . $species . "='" . $name . "'";
//	echo $myword;
    $result = $mysqli->query($myword);
while($row = mysqli_fetch_array($result))
  {
	  echo "<tr>";
	  echo "<td>" . $row[1] . "</td>";
	  echo "<td>" . $row[2] . "</td>";
	  echo "<td>" . $row[3] . "</td>";
	  echo "<td>" . $row[4] . "</td>";
	  echo "<td>" . $row[5] . "</td>";
	  echo "<td>" . $row[6] . "</td>";
	  echo "<td>" . $row[7] . "</td>";
	  
//  echo $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6];
  echo "</tr>";
//  echo "<br />";
  }
    $mysqli->close();  
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$data = $_POST['id'];
if ($_POST['species']=="maize"){
$species="Gene_id";
}else{
$species="GO_id";
}

$groupData = explode("\r\n",$data);
$num = count($groupData);

echo "<dt>search results:</dt>";
echo '<table class="table table-hover table-condensed table-striped">
<thread>
<tr>
<th>Gene_id</th>
<th>GO_id</th>
<th>GO_term</th>
<th>Aspect</th>
<th>Evidence_code</th>
<th>species</th>
<th>Assigned_by</th>
</tr>
</thread>
<tbody>';
for($i=0;$i<$num;++$i){
parse_name($groupData[$i],$species);
}
}
  echo "</tbody>";
  echo "</table>";
?>  

</dd>
		</div>
	</div>
</div>

<br />
<br />
<br />
<div id="footer" class="container" align="center">
<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="navbar-inner navbar-content-center">
        <p class="text-muted credit" style="padding: 1px;">
            <p><a align="left" href="http://202.205.91.110/"><i class="fa fa-arrow-left fa-lwi"  aria-hidden="true"></i>     back to home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Powered by Yumin Huang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-envelope-o fa lwi" aria-hidden="true"></i> Contact information : <a href="mailto:sdws1983@126.com">  sdws1983@126.com</a>.</p>
            <p>Copyright © 2017 CAU JinLab All Rights Reserved.</p>
        </p>
    </div>
</nav>
</div>

</body>
</html>
