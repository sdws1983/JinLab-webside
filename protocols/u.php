<?php
header("Content-Type:text/html;charset=utf-8");
if (//(($_FILES["file"]["type"] == "image/gif")
//|| ($_FILES["file"]["type"] == "image/jpeg")
//|| ($_FILES["file"]["type"] == "image/pjpeg"))
//|| ($_FILES["file"]["type"] == "application/msword")
//|| ($_FILES["file"]["type"] == "application/vnd.ms-excel")
//|| ($_FILES["file"]["type"] == "application/vnd.ms-powerpoint")
//|| ($_FILES["file"]["type"] == "application/pdf")
//|| ($_FILES["file"]["type"] == "text/plain")
//&& (
$_FILES["file"]["size"] < 1000000000)
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    $name = iconv('utf-8','gb2312',$_FILES["file"]["name"]);
    echo "Upload: " . $name . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $name . "<br />";

    if (file_exists("files/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      iconv("UTF-8","gb2312","files/" . $_FILES["file"]["name"]));
      echo "Stored in: " . "files" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>
