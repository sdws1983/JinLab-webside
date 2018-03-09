<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Upload protocols</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
</head>

<body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand"></h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="../">Home</a>
            <a class="nav-link" href="p.php">Protocols</a>
            <a class="nav-link" href="#">Contact</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Upload your protocols.</h1>
        <p class="lead">Please modify the best file name before uploading, once uploaded you will not be able to delete or modify!</p>
        <p class="lead">

<!--<a href="#" class="btn btn-lg btn-secondary">Learn more</a>--!>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<!--<label for="file">Filename:</label>--!>

<input type="radio" name="filetype" value="DNA, RNA and Protein extraction" checked>DNA, RNA and Protein extraction
<br />
<input type="radio" name="filetype" value="PCR">PCR
<br />
<input type="radio" name="filetype" value="Vector construction">Vector construction
<br />
<input type="radio" name="filetype" value="Y2H">Y2H
<br />
<input type="radio" name="filetype" value="Biochemistry assay">Biochemistry assay
<br />
<input type="radio" name="filetype" value="Cytologoy">Cytologoy
<br />
<input type="radio" name="filetype" value="Bioinformatics">Bioinformatics
<br />
<input type="radio" name="filetype" value="Others">Others
<br />
<br />

<input class="btn btn-light" type="file" name="file" id="file"/>
<br />
<br />
<input class="btn btn-lg btn-secondary" type="submit" name="submit" value="Submit" />
</form>
<?php
//header("Content-Type:text/html;charset=utf-8");
if(isset($_POST['submit']) && trim($_POST['submit']) != ''){
if (//(($_FILES["file"]["type"] == "image/gif")
//|| ($_FILES["file"]["type"] == "image/jpeg")
//|| ($_FILES["file"]["type"] == "image/pjpeg"))
//|| ($_FILES["file"]["type"] == "application/msword")
//|| ($_FILES["file"]["type"] == "application/vnd.ms-excel")
//|| ($_FILES["file"]["type"] == "application/vnd.ms-powerpoint")
//|| ($_FILES["file"]["type"] == "application/pdf")
//|| ($_FILES["file"]["type"] == "text/plain")
//&& (
$_FILES["file"]["size"] < 10000000000)
  {
if ($_FILES["file"]["error"] > 0)
{
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}else
{
    echo "<br />Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("files/" . $_FILES["file"]["name"]))
    {
        echo $_FILES["file"]["name"] . " already exists. ";
    }
    else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "files/" . $_POST['filetype'] . "/" . $_FILES["file"]["name"]);
      echo $_FILES["file"]["name"] . " upload successful! " . "<br /><br /><br />";
      echo '<a href="p.php" type="button" class="btn btn-success">Return</a>';
      echo "<script>alert('upload successful!');</script>";
       }
   }
}
else{
echo "<br />File size exceeded limit. " . "<br />";
}
}

?>


        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <!--<p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a></p>--!>
        </div>
      </footer>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>


</body>
</html>
