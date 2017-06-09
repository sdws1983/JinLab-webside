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
					Where to eat today?!
				</h1>
			</div>
			<dd>
			<br />
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<h2>
Let's go!
</h2>
<br />
<input type="submit" class="btn btn-default" name="submit" value="submit"> 
</form>
<br />
<?php
$prize_arr = array( 
    '1' => array('id'=>1,'prize'=>'颐园一层','v'=>12), 
    '2' => array('id'=>2,'prize'=>'颐园二层','v'=>22), 
    '3' => array('id'=>3,'prize'=>'颐园三层','v'=>18), 
    '4' => array('id'=>4,'prize'=>'和园一层','v'=>10), 
    '5' => array('id'=>5,'prize'=>'和园二层','v'=>20), 
    '6' => array('id'=>6,'prize'=>'再来一次','v'=>5), 
);
foreach ($prize_arr as $key => $val) { 
    $arr[$val['id']] = $val['v']; 
} 
function get_rand($proArr) { 
    $result = ''; 

    //概率数组的总概率精度 
    $proSum = array_sum($proArr); 
    //概率数组循环 
    foreach ($proArr as $key => $proCur) { 
        $randNum = mt_rand(1, $proSum);
        //echo $randNum; 
        if ($randNum <= $proCur) { 
            $result = $key; 
            break; 
        } else { 
            $proSum -= $proCur; 
        } 
    }  
    return $result; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$v = get_rand($arr);
$final = $prize_arr[$v]['prize'];
echo "<h1>$final</h1>";
}


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
