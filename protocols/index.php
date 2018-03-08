<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Floating labels example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="text-center mb-4">
        <img class="mb-4" src="protocol_cartoon.jpg" alt="" width="300" height="300">
        <h1 class="h3 mb-3 font-weight-normal">Jinlab protocols</h1>
      </div>

      <div class="form-label-group">
        <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputUsername">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="sub1">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018 | CAU JinLab All Rights Reserved.</p>
    </form>

<?php

if(isset($_POST["sub1"]))
{
$name=$_POST["inputUsername"];
$password=$_POST["inputPassword"];
if($password=="4249"&&$name=="jinlab")//判断密码与注册时密码是否一致
      {
        echo"登录成功！";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."p.php"."\""."</script>";
      }
      {  
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登录失败！"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.php"."\""."</script>";
}
}

?>

  </body>
</html>

