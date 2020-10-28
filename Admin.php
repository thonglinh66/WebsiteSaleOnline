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
	
?>
<?php 
	if(isset($_POST["delete"])){
		$IdProduct = $_POST["IdProduct"];
		$SqlDelete = "DELETE FROM `hanghoa` WHERE `MSHH` = '$IdProduct'";
		mysqli_query($con,$SqlDelete);
		 
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Trang chủ</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="Css/Admin.css" rel="stylesheet">
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
				<a href="<?php echo'AddProduct.php?username='.$id;?>" class="Menu_button">Thêm Sản Phẩm</a>

				<a href="<?php echo'Bill.php?username='.$id;?>" class="Menu_button">Đơn Hàng</a>

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
    <form action="Admin.php" method="post" class="Search">
		<i class="fa fa-search"></i>
		<input id="SearchTex" Name="SearchTex" type="search" >
		<div class="custom-select">
		  <select Name="SearchCheck">
			<option value="0">Nhóm Hàng :</option>
			<option value="AO1">Áo Nam</option>
			<option value="AO2">Áo Nữ</option>
			<option value="CG">Giày Cao Gót</option>
			<option value="DH">Đồng Hồ</option>
			<option value="DT">Điện Thoại</option>
			<option value="GD">Thiết Bị Gia Dụng</option>
			<option value="GIAY1">Giày Nam</option>
			<option value="GIAY2">Giày Nữ</option>
			<option value="LAP">LapTop</option>
			<option value="MEBE">Mẹ & Bé</option>
            <option value="NK">Nón Kết</option>
            <option value="NT">Nội Thất</option>
            <option value="QUAN1">Quan Nam</option>
            <option value="QUAN2">Quan Nu</option>
            <option value="TT">Thể Thao</option>
		  </select>
		</div>
		<input id="Submit" type="submit" name="SearchBtn" value="Tìm Kiếm">
    </form>
    <div class="ListProduct">
	<?php 
	if(empty($_POST["SearchText"])){
		if(!isset($_REQUEST["SearchBtn"]))
		{
			$query = "SELECT * FROM `hanghoa`";
			$result = mysqli_query($con,$query);
			if(mysqli_num_rows($result) == 0){
				echo '<h1>Không có sản phẩm nào</h1>';
			}
			else{
				while($rows = mysqli_fetch_assoc($result)){
					$id = $rows["MSHH"];
					$name = $rows["TenHH"];
					$Money = $rows["Gia"];
					$Count = $rows["SoLuongHang"];
					$Group = $rows["MaNhom"];
					echo'
					<form action="Admin.php" class="product" method="post"	>
						<input type="text" name="IdProduct"	 value="'.$id.'">
						<img src="'.$rows["Hinh"].'" alt="producImg">
						<label id="NameProduct">'.$name.'</label>
						<label id="Money">'.$Money.'</label>
						<label id="Count">'.$Count.'</label>
						<label id="Group">'.$Group.'</label>
						<input type="submit" name="edit" value="Edit">
						<input type="submit" name="delete" value="Delete">
					</form>';
				}
			}
		}
	}
	if(empty($_POST["SearchText"])){
		if(isset($_REQUEST["SearchBtn"]))
		{
			$SearchText = $_POST["SearchTex"];
			$SearchCheck = $_POST["SearchCheck"];
			if($SearchCheck == '0')
				$query = "SELECT * FROM `hanghoa` WHERE  `MSHH` like '%$SearchText%' OR `TenHH` like '%$SearchText%'OR `Gia` like '%$SearchText%'OR `SoLuongHang` like '%$SearchText%'OR `MaNhom` like '%$SearchText%'";
			if($SearchCheck != '0')
			$query = "SELECT * FROM `hanghoa` WHERE ( `MSHH` like '%$SearchText%' OR `TenHH` like '%$SearchText%'OR `Gia` like '%$SearchText%'OR `SoLuongHang` like '%$SearchText%'OR `MaNhom` like '%$SearchText%') AND `MaNhom` = '$SearchCheck'";
			$result = mysqli_query($con,$query);
			if(mysqli_num_rows($result) == 0){
				echo '<h1>Không có sản phẩm nào</h1>';
			}
			else{
				while($rows = mysqli_fetch_assoc($result)){
					$id = $rows["MSHH"];
					$name = $rows["TenHH"];
					$Money = $rows["Gia"];
					$Count = $rows["SoLuongHang"];
					$Group = $rows["MaNhom"];
					echo'
					<form action="Admin.php" class="product" method="post"	>
						<input type="text" name="IdProduct"	 value="'.$id.'">
						<img src="'.$rows["Hinh"].'" alt="producImg">
						<label id="NameProduct">'.$name.'</label>
						<label id="Money">'.$Money.'</label>
						<label id="Count">'.$Count.'</label>
						<label id="Group">'.$Group.'</label>
						<input type="submit" name="edit" value="Edit">
						<input type="submit" name="delete" value="Delete">
					</form>';
				}
			}
		}
	}
        
	?>
	</div>
	<script>
		var a  = <?php echo $IdProduct ?>;
	</script>
</body>
