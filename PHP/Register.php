<div class="ShowError" align="center" style=" border-radius: 30px; text-align: center; width: 300px; height: 150px; background: #8E8B8B; color: white; margin: 0 auto;">
	<h1> Thông Báo !!!</h1>
	<br>
<?php
session_start();
if(isset($_POST['uname'],$_POST['psw'],$_POST['captcha'],$_POST['addres'],$_POST['phone'],$_POST['name'])){
    $Database_host ='localhost';
    $Database_user ='root';
    $Database_pass = '';
    $Database_name = 'quanlybanhang';
    $con = mysqli_connect($Database_host,$Database_user,$Database_pass,$Database_name) or die ('Kết nối thất bại');
    $code = $_POST['captcha'];
    $IdRegis = $_POST['uname'];
    $PassRegis = $_POST['psw'];
    $Phone = $_POST['phone'];
    $Address = $_POST['addres'];
    $name = $_POST['name'];

    $query = "SELECT * FROM `khachhang` WHERE `MSKH` = '$IdRegis'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) == 1){
        echo ' Tài Khoảng Đã Tồn Tại';
    }
    else{
        if($code == $_SESSION['captcha_code'])
        {
            $queryIS = "INSERT INTO `khachhang`(`MSKH`, `HoTenKH`, `DiaChi`, `SoDienThoai`, `MatKhau`) VALUES ('$IdRegis','$name','$Address','$Phone','$PassRegis')";
            mysqli_query($con,$queryIS);
            echo 'Đăng Ký Thành Công';
        }
        else{
            echo'Nhập Sai Mã Captcha';
        }
    }
}

?>

<br>
	<button onClick="window.history.back();" type="button" style="width: 50px;
																		 height: 20px; margin-top: 20px; background: none;
																		 border: 1px solid #F7F6F6"> Ok</button>
</div>