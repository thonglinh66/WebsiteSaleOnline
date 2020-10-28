<?php
	session_start();
?>

<?php
	$Database_host ='localhost';
	$Database_user ='root';
	$Database_pass = '';
	$Database_name = 'quanlybanhang';
	$con = mysqli_connect($Database_host,$Database_user,$Database_pass,$Database_name) or die ('Kết nối thất bại');
	$id = $_SESSION["ID"];
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<?php
    if(isset($_POST['submit_Bill'])){
        $idbill = $_POST['IdBill'];
        $queryInsert = "UPDATE `dathang` SET `MSNV`='$id',`TrangThai`= '1' WHERE `SoDonDH` = '$idbill' ";
        mysqli_query($con,$queryInsert);
        echo "<script>alert('Cập nhật thành công')</script>";
        echo "<script> window.history.back();</script> " ; 
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Trang chủ</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="Css/Admin.css" rel="stylesheet">
    <link href="Css/Bill.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	

	<script type="text/javascript" src="Js/jquery-3.4.1.min.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script>  
	var body;
	$(document).ready(function() {  
		body = document.getElementsByTagName("body")[0];  
		$('body').niceScroll({cursoropacitymax:0.8,cursorwidth:8});          
		initScroll();    
	});
	</script>
</head>	

<body onLoad="LoadPage()">
	<div class="Home">
		<div class="Top">
			<div id="Logo">
			</div>
			<div class="Menu_top" id="Menu"  >
				<a href="Admin.php" class="Menu_button">Trang Chủ</a>
				<a href="AddProduct.php" class="Menu_button">Thêm Sản Phẩm</a>

				<a href="#ĐonHang" class="Menu_button">Đơn Hàng</a>

				<a href="#TongTien" class="Menu_button">Tổng Tiền</a>	
				<a href="#Mail" class="Menu_button" id="mail">
					<i class="fa fa-envelope"></i>
				</a>
				<a href="Login.php" class="Menu_button" id="news">
					<i class="fa fa-sign-out"></i>
				</a>
				
			</div>
			
        </div>	
    </div>
    <?php
        $query = "SELECT * FROM `chitietdathang`, `dathang` WHERE `chitietdathang`.`SoDonDH` = `dathang`.`SoDonDH` ORDER BY `NgayDH` DESC";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result) == 0) {
            echo '<h1> Không có đơn hàng nào</h1>';
        }else{
            while($rows = mysqli_fetch_assoc($result)){
                $IdBill =  $rows['SoDonDH'];
                $stt =  $rows['TrangThai'];
                $Total = $rows['GiaDatHang'];
                    $temp = $IdBill;
                    echo'
                    <form action="'.$actual_link.'" method="post" enctype="multipart/form-data" class="Cotain_Bill" >
                    <div class="Title_Bill">
                        <input type="hidden" name="IdBill" value="'.$temp.'">
                        <label > Hóa đơn : '.$temp.'</label>
                    </div>';
                   $queryBill = "SELECT `MSHH`, `SoLuong` FROM `chitietdathang` WHERE `SoDonDH` = '$temp' ";
                   $resultBill = mysqli_query($con,$queryBill);
                   while($rowsBill = mysqli_fetch_assoc($resultBill)){
                       $Product =  $rowsBill['MSHH'];
                       $Count = $rowsBill['SoLuong'];
                       echo'  
                       <div class="List_Pro">
                           <label class="Product"> Sản Phẩm : '.$Product.' </label>
                           <label class="Count"> Số Lượng : '.$Count.' </label>
                       </div>';
                           
                   }
                   echo'
                   <div class="Total"> 
                       <label > Tổng Giá : '.$Total.' </label>
                   </div>';
                   if($stt != 1){
                       echo'
                    <button type="submit" name="submit_Bill" class="submit_form" > Chấp nhận</button>';
                   }else{
                       echo'
                    <button type="button" name="submit_Bill" class="submit_form" > Đã duyệt</button>';
                   }
                  echo'
                   </form>';
               
               
            }
        }
           
    ?>
</body>