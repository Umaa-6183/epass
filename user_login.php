<?php

session_start();
require_once "connection.php";
if(isset($_POST['login'])){
$username= $_POST['uname'];
$password= md5($_POST['pass']);

$sql= "SELECT * FROM user where username='$username' and password='$password'";
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_assoc($result);
if($row){
	$sql1="select username from admin where username='$username'";
	$sql2="select username from conductor where username='$username'";
	$sql3="select username from passenger where username='$username'";
	$result1=mysqli_query($con,$sql1);
	$row1= mysqli_fetch_assoc($result1);
	if($row1){

		$_SESSION['type']='admin';
		$_SESSION['username']=$username;
		if(!empty($_POST['remember'])){

			setcookie("member_login",$_POST["uname"],time()+(3600*24*30));
			setcookie("member_password",$_POST['pass'],time()+(3600*24*30));
			header("Location:admin/admin_homepage.php");
		}
		else{
			if(isset($_COOKIE['member_login'])){
				setcookie("member_login","");

			}
			if(isset($_COOKIE['member_password'])){
				setcookie("member_password","");

			}
			header("Location:admin/admin_homepage.php");
		}

	}


	$result2=mysqli_query($con,$sql2);
	$row2= mysqli_fetch_assoc($result2);
	if($row2){
		$_SESSION['type']='conductor';
		$_SESSION['username']=$username;
		if(!empty($_POST['remember'])){
			setcookie("member_login",$_POST["uname"],time()+(3600*24*30));
			setcookie("member_password",$_POST['pass'],time()+(3600*24*30));
			header("Location:conductor/conductor_homepage.php");
			exit;
		}
		else{
			if(isset($_COOKIE['member_login'])){
				setcookie("member_login","");

			}
			if(isset($_COOKIE['member_password'])){
				setcookie("member_password","");

			}
			header("Location:conductor/conductor_homepage.php");
		}
	}


	$result3=mysqli_query($con,$sql3);
	$row3= mysqli_fetch_assoc($result3);
	if($row3){
		$sql3_0="SELECT passenger_type from passenger where username='$username'";
		$result3_0=mysqli_query($con,$sql3_0);
		$row3_0= mysqli_fetch_assoc($result3_0);
		$p_type=$row3_0['passenger_type'];
		$sql3_0_1="select status from user where username='$username'";
		$result3_0_1=mysqli_query($con,$sql3_0_1);
		$row3_0_1= mysqli_fetch_assoc($result3_0_1);
		$status=$row3_0_1['status'];

		if($status==1){
			if($p_type=='student'){
				$_SESSION['type']='student';
				$_SESSION['username']=$username;

				if(!empty($_POST['remember'])){

					setcookie("member_login",$_POST["uname"],time()+(3600*24*30));
					setcookie("member_password",$_POST['pass'],time()+(3600*24*30));

					header("Location:passenger/student_homepage.php");
					exit;
				}
				else{

					if(isset($_COOKIE['member_login'])){
						setcookie("member_login","");

					}
					if(isset($_COOKIE['member_password'])){
						setcookie("member_password","");

					}
					header("Location:passenger/student_homepage.php");
				}
			}

			if($p_type=='senior'){
				$_SESSION['type']='senior';
				$_SESSION['username']=$username;
				if(!empty($_POST['remember'])){
					setcookie("member_login",$_POST["uname"],time()+(3600*24*30));
					setcookie("member_password",$_POST['pass'],time()+(3600*24*30));
					header("Location:passenger/senior_homepage.php");
					exit;
				}
				else{
					if(isset($_COOKIE['member_login'])){
						setcookie("member_login","");

					}
					if(isset($_COOKIE['member_password'])){
						setcookie("member_password","");

					}
					header("Location:passenger/senior_homepage.php");
				}
			}

			if($p_type=='normal'){
				$_SESSION['type']='normal';
				$_SESSION['username']=$username;
				if(!empty($_POST['remember'])){
					setcookie("member_login",$_POST["uname"],time()+(3600*24*30));
					setcookie("member_password",$_POST['pass'],time()+(3600*24*30));
					header("Location:passenger/normal_homepage.php");
					exit;
				}
				else{
					if(isset($_COOKIE['member_login'])){
						setcookie("member_login","");

					}
					if(isset($_COOKIE['member_password'])){
						setcookie("member_password","");

					}
					header("Location:passenger/normal_homepage.php");
				}
			}

	}
	else{?>
		<script>
			alert("Permission denied");
			window.location.assign("login.php");
		</script>
	<?php }

	}
}
else{
	?>
		<script>

			alert("login credentials are invalid");
				window.location.assign("login.php");
		</script>
	<?php
}


}


 ?>
