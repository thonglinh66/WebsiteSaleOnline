<?php
session_start();
?>
<div class="ShowError" align="center" style=" border-radius: 30px; text-align: center; width: 300px; height: 150px; background: #8E8B8B; color: white; margin: 0 auto;">
	<h1> Thông Báo !!!</h1>
	<br>
<?php
if(!isset($_POST['Username'],$_POST['Password'])){
    die('Vui lòng nhập User và Password');
}
//Ket noi Database
$Database_host ='localhost';
$Database_user ='root';
$Database_pass = '';
$Database_name = 'quanlybanhang';
$con = mysqli_connect($Database_host,$Database_user,$Database_pass,$Database_name) or die ('Kết nối thất bại');

$username = mysqli_real_escape_string($con, $_POST['Username']);
$password = mysqli_real_escape_string($con, $_POST['Password']);

$query = "SELECT * FROM nhanvien WHERE MSNV='$username'";
$results = mysqli_query($con, $query);


if (mysqli_num_rows($results) == 0) {
	echo "Tai khoan khong ton tai";
}

if(mysqli_num_rows($results) == 1){
	while($row = mysqli_fetch_assoc($results)) {
		if($row['Pass'] == $_POST['Password']){
			$_SESSION["ID"] = $username;
			$url = "Admin.php?username=" . $_SESSION["ID"];
			
		
			header('Location:../'.$url);
		}else {
			echo "Mat khau khong dung";
//   			header('Location:../Login.html');
		}
		
	}
}
?>
	<br>
	<button onClick="location.href='../login.php'" type="button" style="width: 50px;
																		 height: 20px; margin-top: 20px; background: none;
																		 border: 1px solid #F7F6F6"> Ok</button>
</div>
