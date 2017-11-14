<!DOCTYPE html>
<html>
<head>
  <title>conductor registration</title>
</head>
</html>
<?php
session_start();
$_SESSION['admin_id'] = 1;
require_once "../connection.php";

if(isset($_POST['submit']))
{
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $phno = $_POST['phno'];
  $address = $_POST['address'];
  $uname = $_POST['uname'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];
  $rid = $_POST['rid'];
  $gender = $_POST['gender'];
  $aid = $_SESSION['admin_id'];
  $target_dir1 = "../profile_pics/";
  $target_dir2 = "../signatures/";

  $fileData1 = pathinfo(basename($_FILES["pic"]["name"]));
  $fileData2 = pathinfo(basename($_FILES["sign"]["name"]));

  $file_name1 = $uname . "-pic" . "." . $fileData1['extension'];
  $file_name2 = $uname . "-sign" . "." . $fileData2['extension'];

  $target_file1 = $target_dir1 . $file_name1;
  $target_file2 = $target_dir2 . $file_name2;

  $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
  $imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);

  $uploadOk = 1;
  $passOk = 1;


  if($pass1 != $pass2){
    $passOk = 0;
    echo "Password does not match";
  }


  if (file_exists($target_file1) && file_exists($target_file2)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  if ($_FILES["pic"]["size"] > 500000 && $_FILES["sign"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
    $uploadOk = 0;
  }
  if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
    $uploadOk = 0;
  }


  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

  } else {
    if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file1)) {
      echo "Sorry, there was an error uploading your photo";
      $uploadOk = 0;
    }
    if (!move_uploaded_file($_FILES["sign"]["tmp_name"], $target_file2)) {
      echo "Sorry, there was an error uploading your sign";
      $uploadOk = 0;
    }
  }

  if($uploadOk==1 && $passOk==1)
  {
    $sql1 = "INSERT INTO user VALUES ('$uname','$pass2','$fname','$mname','$lname','$email','$dob','$phno','$address','$target_file2','$target_file1','$gender',true)";
    $sql2 = "INSERT INTO conductor(admin_id,route_id,username) VALUES('$aid','$rid','$uname')";
    if(mysqli_query($con,$sql1) && mysqli_query($con,$sql2)){
      $success = 1;
      ?>
      <script>
      alert("Success");
      window.location.assign("admin_panel.html");
      </script> <?php }
    else { echo mysqli_error($con);


      unlink($target_file1);
      unlink($target_file2);

  }
}
  else {

       ?>
    <script>
    alert("There was an error during insertion");
    window.location.assign("conductor_register.html");
    </script>
    <?php }

  }

  else {?>
    <script>
    alert("No data Submitted");
    window.location.assign("conductor_register.html")
    </script>
    <?php }
    session_destroy();
    ?>
