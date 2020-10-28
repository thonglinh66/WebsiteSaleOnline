<?php
session_start();
?>
<div class="ShowError" align="center" style=" border-radius: 30px; text-align: center; width: 300px; height: 150px; background: #8E8B8B; color: white; margin: 0 auto;">
	<h1> Thông Báo !!!</h1>
	<br>
<?php
if(!isset($_POST["uname"],$_POST["psw"])){
    die('Vui lòng nhập User và Password');
}
//Ket noi Database
$Database_host ='localhost';
$Database_user ='root';
$Database_pass = '';
$Database_name = 'quanlybanhang';
$con = mysqli_connect($Database_host,$Database_user,$Database_pass,$Database_name) or die ('Kết nối thất bại');

$username = mysqli_real_escape_string($con,$_POST["uname"]);
$password = mysqli_real_escape_string($con, $_POST["psw"]);
          

$query = "SELECT `MatKhau` FROM `khachhang` WHERE  `MSKH` =  '$username'";
$results = mysqli_query($con, $query);


if (mysqli_num_rows($results) == 0) {
	echo "Tai khoan khong ton tai";
}

if(mysqli_num_rows($results) == 1){
	while($row = mysqli_fetch_assoc($results)) {
        if($row['MatKhau'] ==  $_POST["psw"]){
			$_SESSION["username"] = $username;
			$BackURL = $_SERVER['HTTP_REFERER'];
			$character = '?';
			if (strpos($BackURL, '?') !== false) {
				$character = '&';
			}
            $url = $BackURL.$character."username=" . $_SESSION["username"];
            
        
            header('Location:'.$url);
        }else {
            echo "Mat khau khong dung";
//   			header('Location:../Login.html');
        }
	}
		
}
?>
	<br>
	<button onClick="window.history.back();" type="button" style="width: 50px;
																		 height: 20px; margin-top: 20px; background: none;
																		 border: 1px solid #F7F6F6"> Ok</button>
</div>
