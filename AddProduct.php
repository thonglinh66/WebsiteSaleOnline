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
	if(isset($_POST['Add'])){
		$sqlQuery = "SELECT * FROM hanghoa";
		$resultSql = mysqli_query($con,$sqlQuery);
		if(mysqli_num_rows($resultSql) == 0){
			$idHH = "A001";
		}
		else{
			while($rowsql = mysqli_fetch_assoc($resultSql) ){
				$temp = $rowsql['MSHH']; 
				$tong = (int)strstr($temp,'0') + 1;
				$dem = strlen($tong);
				if($dem == 1){
					$idHH = "A00".$tong;
				}
				else if($dem > 1){
					$idHH = "A0".$tong;
				}
			}
		}
		$name_img = $_FILES['image']['name'];
  $target_dir = "Image/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
  
     // Upload file
     	move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name_img );
		$image = $_FILES['image']['name'];
        if(isset($image)){
            $images = base64_encode(file_get_contents(addslashes($image)));
		}
		$scrimg = "Image/".$name_img;
		$name = $_POST['Name'];
		$gia = $_POST['Gia'];
		$soluong = $_POST['SoLuong'];
		$nhom = $_POST['Group'];
		$text = $_POST['Text'];
		$sql = "INSERT INTO `hanghoa`(`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `Hinh`, `MoTaHH`) VALUES ('$idHH','$name','$gia','$soluong','$nhom','$$scrimg','$text')";
		mysqli_query($con,$sql);
		echo "<script>alert('Đã Thêm Sản Phẩm')</script>";
		echo "<script> window.history.back();</script> " ; 
		}
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

<body onLoad="sortList()">
	<div class="Home">
		<div class="Top">
			<div id="Logo">
			</div>
			<div class="Menu_top" id="Menu"  >
				<a href="<?php echo'Admin.php?username='.$id;?>" class="Menu_button">Trang Chủ</a>
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
    <form  class="Add" action="<?php echo $actual_link?>" method="post" enctype="multipart/form-data">	
		<div class="tag">
			<label  for="Name">Tên Sản Phẩm</label>
			<input type="text" name="Name"placeholder="Name">
		</div>
		<div class="tag">
			<label  for="Gia">Giá</label>
			<input type="text" name="Gia" placeholder="Gia">
		</div>
		<div class="tag">
			<label  for="images">Ảnh</label>
			<input type="file" value="" name="image">
		</div>
		
		<div class="tag">
			<label  for="SoLuong">Số Lượng</label>
			<input type="text" name="SoLuong" placeholder="SoLuong">
		</div>
		<div class="tag">
			<label  for="MoTa">Mô Tả</label>
			​<textarea id="txtArea" name="Text" rows="10" cols="72"></textarea>
		</div>
		<div class="tag">
			<label  for="Nhóm Sản Phẩm">Chọn Nhóm</label>
			<?php 
				$query = "SELECT  * FROM nhomhanghoa";
				$result = mysqli_query($con,$query);
				echo'<select  id="id01" name="Group">
					<option value="0">Nhóm Hàng :</option>';
				while($rows =  mysqli_fetch_assoc($result)){
					$IDNhom = $rows['MaNhom'];
					$TenNhom = $rows['TenNhom'];
					echo'<option class="ListOption" value="'.$IDNhom.'">'.$TenNhom.'</option>';	
				}
				echo '</select>';
			?>
		</div>
		<input type="submit" name="Add" value="Thêm">
	</form>
	<script>
	function sortList() {
	var list, i, switching, b, shouldSwitch;
	list = document.getElementById("id01");
	switching = true;
	/* Make a loop that will continue until
	no switching has been done: */
	while (switching) {
		// start by saying: no switching is done:
		switching = false;
		b = list.getElementsByClassName("ListOption");
		// Loop through all list-items:
		for (i = 0; i < (b.length - 1); i++) {
		// start by saying there should be no switching:
		shouldSwitch = false;
		/* check if the next item should
		switch place with the current item: */
		if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
			/* if next item is alphabetically
			lower than current item, mark as a switch
			and break the loop: */
			shouldSwitch = true;
			break;
		}
		}
		if (shouldSwitch) {
		/* If a switch has been marked, make the switch
		and mark the switch as done: */
		b[i].parentNode.insertBefore(b[i + 1], b[i]);
		switching = true;
		}
	}
	}
</script>
</body>
