<!DOCTYPE html>
<?php
require_once "../connection.php";

if(isset($_POST['submit1'])){
  $fname= $_POST['fname'];
  $mname= $_POST['mname'];
  $lname= $_POST['lname'];
  $uname= $_POST['uname'];
  $pass= $_POST['pass'];
  $pass1=$_POST['pass1'];
  $password= md5($_POST['pass']);
  $email= $_POST['email1'];
  $bdate= $_POST['bdate'];
  $phno= $_POST['phno'];
  $addr= $_POST['addr'];

  $Cname= $_POST['colgName'];
  $req= 0;
  $sex= $_POST['gender1'];


  $target_dir1="../profile_pics/";
  $target_dir2="../signatures/";
  $target_dir3="../IDProof/";
  $target_dir4="../stuID/";

  $fileData1 = pathinfo(basename($_FILES["pic"]["name"]));
  $fileData2= pathinfo(basename($_FILES["sign"]["name"]));
  $fileData3= pathinfo(basename($_FILES["photoId"]["name"]));
  $fileData4= pathinfo(basename($_FILES["colgID"]["name"]));


  $file_name1 = $uname."-pic".".".$fileData1['extension'];
  $file_name2 = $uname."-sign".".".$fileData2['extension'];
  $file_name3 = $uname."-IDProof".".".$fileData3['extension'];
  $file_name4 = $uname."-Stuid".".".$fileData4['extension'];


  $target_file1 = $target_dir1 . $file_name1;
  $target_file2 = $target_dir2 . $file_name2;
  $target_file3 = $target_dir3 . $file_name3;
  $target_file4 = $target_dir4 . $file_name4;


  $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
  $imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
  $imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
  $imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);

  $passOK=1;
  $uploadOk = 1;
  if($pass!=$pass1){
    $passOK=0;
    ?>
    <script>
    alert("password mismatch");

    window.location.assign("student_register.html");
    </script>
    <?php
  }
  if (file_exists($target_file1) && file_exists($target_file2) && file_exists($target_file3) && file_exists($target_file4)  ){

    echo "Sorry, file already exists. either DP,sign or photoID";
    $uploadOk = 0;
  }

  if ($_FILES["pic"]["size"] > 500000 && $_FILES["sign"]["size"] > 500000 && $_FILES["photoId"]["size"]>500000  && $_FILES["colgID"]["size"]>500000) {
    echo "Sorry, your file is too large. either DP,sign or photoID";
    $uploadOk = 0;
  }

  if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" ) {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
    $uploadOk = 0;
  }
  if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
    $uploadOk = 0;
  }
  if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" ) {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
    $uploadOk = 0;
  }
  if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg" ) {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
    $uploadOk = 0;
  }


  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. either DP,sign or photoID";

  } else {
    if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file1)) {
      echo "Sorry, there was an error uploading your photo either DP,sign or photoID";
      $uploadOk = 0;
    }
    if (!move_uploaded_file($_FILES["sign"]["tmp_name"], $target_file2)) {
      echo "Sorry, there was an error uploading your sign either DP,sign or photoID";
      $uploadOk = 0;
    }
    if (!move_uploaded_file($_FILES["photoId"]["tmp_name"], $target_file3)) {
      echo "Sorry, there was an error uploading your photo either DP,sign or photoID";
      $uploadOk = 0;
    }
    if (!move_uploaded_file($_FILES["colgID"]["tmp_name"], $target_file4)) {
      echo "Sorry, there was an error uploading your photo either DP,sign or photoID";
      $uploadOk = 0;
    }
  }
  if($uploadOk==1 && $passOK==1){
    $sql1= " INSERT INTO user VALUES ('$uname','$password','$fname','$mname','$lname','$email','$bdate','$phno','$addr','$target_file2','$target_file1','$sex',0)";

    $sql2 = "INSERT INTO passenger(photo_id,username,organisation,passenger_type,id_card) VALUES('$target_file3','$uname','$Cname','student','$target_file4')";


    if(mysqli_query($con,$sql1) && mysqli_query($con,$sql2)){
      ?>
      <script>
      alert("Registration successful");
      window.location.assign("../index.php");
      </script>
      <?php }
      else echo mysqli_error($con);
      unlink($target_file1);
      unlink($target_file2);
      unlink($target_file3);
      unlink($target_file4);

      mysqli_close($con);
    }

  }
  else
  if(isset($_POST['submit1'])){ ?>

    <script>
    alert("Could not complete registration");
    window.location.assign("student_register.html");
    </script>
    <?php }


    if(isset($_POST['submit2'])){
      $fname= $_POST['fname'];
      $mname= $_POST['mname'];
      $lname= $_POST['lname'];
      $uname= $_POST['uname'];
      $pass= $_POST['pass'];
      $pass1=$_POST['pass1'];
      $password= md5($_POST['pass']);
      $org=$_POST['org'];

      $email= $_POST['email1'];
      $bdate= $_POST['bdate'];
      $phno= $_POST['phno'];
      $addr= $_POST['addr'];


      $req= 'pending';
      $sex= $_POST['gender1'];

      $target_dir1="../profile_pics/";
      $target_dir2="../signatures/";
      $target_dir3="../IDProof/";
      $target_dir4="../SeniorID/";

      $fileData1 = pathinfo(basename($_FILES["pic"]["name"]));
      $fileData2= pathinfo(basename($_FILES["sign"]["name"]));
      $fileData3= pathinfo(basename($_FILES["photoId"]["name"]));
      $fileData4= pathinfo(basename($_FILES["seniorID"]["name"]));


      $file_name1 = $uname."-pic".".".$fileData1['extension'];
      $file_name2 = $uname."-sign".".".$fileData2['extension'];
      $file_name3 = $uname."-IDProof".".".$fileData3['extension'];
      $file_name4 = $uname."-Seniorid".".".$fileData4['extension'];


      $target_file1 = $target_dir1 . $file_name1;
      $target_file2 = $target_dir2 . $file_name2;
      $target_file3 = $target_dir3 . $file_name3;
      $target_file4 = $target_dir4 . $file_name4;


      $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
      $imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
      $imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
      $imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);

      $passOK=1;
      $uploadOk = 1;
      if($pass!=$pass1){
        $passOK=0;
        ?>
        <script>
        alert("password mismatch");
        window.location.assign("senior_register.html");
        </script>
        <?php
      }

      if (file_exists($target_file1) && file_exists($target_file2) && file_exists($target_file3) && file_exists($target_file4)  ){

        echo "Sorry, file already exists. either DP,sign or photoID";
        $uploadOk = 0;
      }

      if ($_FILES["pic"]["size"] > 500000 && $_FILES["sign"]["size"] > 500000 && $_FILES["photoId"]["size"]>500000  && $_FILES["seniorID"]["size"]>500000) {
        echo "Sorry, your file is too large. either DP,sign or photoID";
        $uploadOk = 0;
      }

      if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" ) {
        echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
        $uploadOk = 0;
      }
      if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
        $uploadOk = 0;
      }
      if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" ) {
        echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
        $uploadOk = 0;
      }
      if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg" ) {
        echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
        $uploadOk = 0;
      }


      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. either DP,sign or photoID";

      } else {
        if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file1)) {
          echo "Sorry, there was an error uploading your photo either DP,sign or photoID";
          $uploadOk = 0;
        }
        if (!move_uploaded_file($_FILES["sign"]["tmp_name"], $target_file2)) {
          echo "Sorry, there was an error uploading your sign either DP,sign or photoID";
          $uploadOk = 0;
        }
        if (!move_uploaded_file($_FILES["photoId"]["tmp_name"], $target_file3)) {
          echo "Sorry, there was an error uploading your photo either DP,sign or photoID";
          $uploadOk = 0;
        }
        if (!move_uploaded_file($_FILES["seniorID"]["tmp_name"], $target_file4)) {
          echo "Sorry, there was an error uploading your photo either DP,sign or photoID";
          $uploadOk = 0;
        }
      }
      if($uploadOk==1 && $passOK==1){
        $unique=$uname.$lname.$phno;
        $sql1= " INSERT INTO user VALUES ('$uname','$password','$fname','$mname','$lname','$email','$bdate','$phno','$addr','$target_file2','$target_file1','$sex',0)";

        $sql2 = "INSERT INTO passenger(photo_id,username,organisation,passenger_type,id_card) VALUES('$target_file3','$uname','$org','senior','$target_file4')";





        if(mysqli_query($con,$sql1) && mysqli_query($con,$sql2) ){
          ?>
          <script>
          alert("Registration successful");
          window.location.assign("../index.php");
          </script>
          <?php }
          else { echo mysqli_error($con);
            unlink($target_file1);
            unlink($target_file2);
            unlink($target_file3);
            unlink($target_file4);
            mysqli_close($con);
          }
        }
      }

      else
      if(isset($_POST['submit2'])){?>
        <script>
        alert("Could not complete registration");
        window.location.assign("senior_register.html");
        </script>
        <?php
      }

      if(isset($_POST['submit3'])){
        $fname= $_POST['fname'];
        $mname= $_POST['mname'];
        $lname= $_POST['lname'];
        $uname= $_POST['uname'];
        $pass= $_POST['pass'];
        $pass1=$_POST['pass1'];
        $password= md5($_POST['pass']);
        $email= $_POST['email1'];
        $bdate= $_POST['bdate'];
        $phno= $_POST['phno'];
        $addr= $_POST['addr'];
        $org=$_POST['org'];


        $req= 'pending';
        $sex= $_POST['gender1'];

        $target_dir1="../profile_pics/";
        $target_dir2="../signatures/";
        $target_dir3="../IDProof/";


        $fileData1 = pathinfo(basename($_FILES["pic"]["name"]));
        $fileData2= pathinfo(basename($_FILES["sign"]["name"]));
        $fileData3= pathinfo(basename($_FILES["photoId"]["name"]));



        $file_name1 = $uname."-pic".".".$fileData1['extension'];
        $file_name2 = $uname."-sign".".".$fileData2['extension'];
        $file_name3 = $uname."-IDProof".".".$fileData3['extension'];



        $target_file1 = $target_dir1 . $file_name1;
        $target_file2 = $target_dir2 . $file_name2;
        $target_file3 = $target_dir3 . $file_name3;



        $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
        $imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
        $imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);

        $uploadOk = 1;
        $passOK=1;
        if($pass!=$pass1){
          $passOK=0;
          ?>
          <script>
          alert("password mismatch");
          window.location.assign("normal_register.html");
          </script>

          <?php
        }
        if (file_exists($target_file1) && file_exists($target_file2) && file_exists($target_file3) ){

          echo "Sorry, file already exists. either DP,sign or photoID";
          $uploadOk = 0;
        }

        if ($_FILES["pic"]["size"] > 500000 && $_FILES["sign"]["size"] > 500000 && $_FILES["photoId"]["size"]>500000 ) {
          echo "Sorry, your file is too large. either DP,sign or photoID";
          $uploadOk = 0;
        }

        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" ) {
          echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
          $uploadOk = 0;
        }
        if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
          echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
          $uploadOk = 0;
        }
        if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" ) {
          echo "Sorry, only JPG, JPEG, PNG  files are allowed. either DP,sign or photoID";
          $uploadOk = 0;
        }



        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded. either DP,sign or photoID";

        } else {
          if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file1)) {
            echo "Sorry, there was an error uploading your photo either DP,sign or photoID";
            $uploadOk = 0;
          }
          if (!move_uploaded_file($_FILES["sign"]["tmp_name"], $target_file2)) {
            echo "Sorry, there was an error uploading your sign either DP,sign or photoID";
            $uploadOk = 0;
          }
          if (!move_uploaded_file($_FILES["photoId"]["tmp_name"], $target_file3)) {
            echo "Sorry, there was an error uploading your photo either DP,sign or photoID";
            $uploadOk = 0;
          }

        }
        if($uploadOk==1 && $passOK==1){
          $unique=$uname.$lname.$phno;
          $sql1= " INSERT INTO user VALUES ('$uname','$password','$fname','$mname','$lname','$email','$bdate','$phno','$addr','$target_file2','$target_file1','$sex',0)";

          $sql2 = "INSERT INTO passenger(photo_id,username,organisation,passenger_type) VALUES('$target_file3','$uname','$org','normal')";

          if(mysqli_query($con,$sql1) && mysqli_query($con,$sql2) ){

            ?>
            <script>
            alert("Registration successful");
            window.location.assign("../index.php");
            </script>
            <?php }
            else{ echo mysqli_error($con);
              unlink($target_file1);
              unlink($target_file2);
              unlink($target_file3);
              unlink($target_file4);
              mysqli_close($con);
            }
          }

        }
        else
        if(isset($_POST['submit3'])){?>
          <script>
          alert("Could not complete registration");
          window.location.assign("normal_register.html");
          </script>
          <?php
        }
        ?>
