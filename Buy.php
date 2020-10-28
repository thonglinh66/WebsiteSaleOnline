<?php
	$Database_host ='localhost';
	$Database_user ='root';
	$Database_pass = '';
	$Database_name = 'quanlybanhang';
    $con = mysqli_connect($Database_host,$Database_user,$Database_pass,$Database_name) or die ('Kết nối thất bại');
    $sqlQuery = "SELECT * FROM `chitietdathang`";
    $resultSql = mysqli_query($con,$sqlQuery);
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(mysqli_num_rows($resultSql) == 0){
        $IDHD = "N001";
    }
    else{
        while($rowsql = mysqli_fetch_assoc($resultSql) ){
            $temp = $rowsql['MSHH']; 
            $tong = (int)strstr($temp,'0') + 1;
            $dem = strlen($tong);
            if($dem == 1){
                $IDHD = "N00".$tong;
            }
            else if($dem > 1){
                $IDHD = "N0".$tong;
            }
        }
    }  
?>
<?php 
    session_start();
?>
<?php
    $dem = 0;
    if (isset($_POST['remove'])){
        foreach($_SESSION['cart'] as $rows)
        {
            $ID_Pro = $rows['product_id'];
            if($ID_Pro == $_POST['IdProduct']){
                unset($_SESSION['cart'][$dem]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script> window.history.back();</script> " ; 
            }
            $dem ++;
        }
      }
    if(isset($_POST['Buy'])&&(isset($_GET['username']))){
        if(($_POST['TOTAL'] > 0)){
            $name = $_GET['username'];
            foreach($_SESSION['cart'] as $rows)
            {
                $ID_Pro = $rows['product_id'];
                $Count_Saled = $rows['count'];
                $Price = $_POST['TOTAL'];
                $query = "INSERT INTO `chitietdathang`(`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`) VALUES ('$IDHD','$ID_Pro','$Count_Saled','$Price')";
                mysqli_query($con,$query);
                $today = date("Y-m-d H:i:s");
                $queryBill = "INSERT INTO `dathang`(`SoDonDH`, `MSKH`, `NgayDH`, `TrangThai`) VALUES ('$IDHD','$name','$today','0')";
                mysqli_query($con,$queryBill);
            }
            echo "<script>alert('Đặt hàng thành công')</script>";
                echo "<script> window.history.back();</script> " ; 
                unset($_SESSION['cart']);
        }
        else{
            echo "<script>alert('Chưa chọn địa chỉ nhận hàng...!')</script>";
                echo "<script> window.history.back();</script> " ; 
        }
    }
?>
<head>
    <title>ShopLyon</title>
    <meta charset="utf-8" />
    <link href="Css/Top.css" rel="stylesheet">
    <link href="Css/Buy.css" rel="stylesheet">
    <link href="Css/Infor.css" rel="stylesheet">
    <link href="Css/LoginUser.css" rel="stylesheet">
    <link href="Css/Product.css" rel="stylesheet">
    <link href="Css/ListBar.css" rel="stylesheet">
    <link href="Css/Bottom.css" rel="stylesheet">
    <link href="Css/all.min.css" rel="stylesheet">
    <link href="Css/fontawesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="Js/Load.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script   src="js/jquery.nicescroll.js"></script>
	<script>  
	var body;
	$(document).ready(function() {  
		body = document.getElementsByTagName("body")[0];  
		$('body').niceScroll({cursoropacitymax:0.8,cursorwidth:8});          
		initScroll();    
	});
	</script>
</head>
<body >
    <?php 
        include 'Top.php';
    ?>
     <div class="ListProduct">
     <div class="product_first">
        <input type="text" name="IdProduct"	 value="MSHH">
        <label id="Img">Hình Ảnh</label>
        <label id="NameProduct">Tên Sản Phẩm</label>
        <label id="Money">Tiền</label>
        <label id="CountSaled">Số Lượng</label>
        <label id="Delete">Xóa</label>
</div>
    <?php
        $CountRised = 0;
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $rows)
           {
                $ID_Pro = $rows['product_id'];
                $Count_Saled = $rows['count'];
                $query = "SELECT * FROM `hanghoa` WHERE `MSHH` = '$ID_Pro'";
                $result = mysqli_query($con,$query);
                if(mysqli_num_rows($result) == 0){
                    echo '<h1>Không có sản phẩm nào</h1>';
                }
                else
                {
                    while($rows = mysqli_fetch_assoc($result)){
                        $id = $rows["MSHH"];
                        $name = $rows["TenHH"];
                        $Money = $rows["Gia"];
                        $Count = $rows["SoLuongHang"];
                        $Group = $rows["MaNhom"];
                        $Money = $Count_Saled * $Money;
                        $CountRised += $Money;
                        echo'
                        <form action="'.$actual_link.'" class="product" method="post"	>
                            <input type="text" name="IdProduct"	 value="'.$id.'">
                            <img src="'.$rows["Hinh"].'" alt="producImg">
                            <label id="NameProduct">'.$name.'</label>
                            <label id="Money">'.$Money.'</label>
                            <label id="CountSaled">'.$Count_Saled.'</label>
                            <input type="submit" name="remove" value="Delete">
                        </form>';
                    }
                }
                
                
            }
            
        }
        echo'
        <form action="'.$actual_link.'"  method="POST" >
                        <div class="Total"	>  
                        <label id="Total_Saled"> Tổng Giá: </label> <label class="CountMoneyTotal"  id="MoneyItem"> '.$CountRised.'</label>
                        <label id="Total_Saled"> Phí vận chuyển: </label> <label class="CountMoneyTotal" id="Count"> </label>
                        <label id="Total_Saled"> Thành tiền: </label> <label type="text" class="CountMoneyTotal" id="Total" > </label> <input type="hidden" id="Total2" name="TOTAL" value="">
                            <div class="Checkin" >
                    <div class="TextCheckint">
                        <i class="fa fa-truck-moving"></i>
                        <p class="TextCheck">Vẫn chuyển tới</p>
                    </div>
                    <div class="select-box">
                        <div class="selected">
                          Chọn Nơi Nhận Hàng <i class="fa fa-caret-down"></i>
                         </div>
                        <div class="options-container">
                            <div class="option">
                            <input
                            type="radio"
                            class="radio"
                            id="HN"
                            name="category"
                            value="0.04"
                             />
                        <label for="automobiles">Hà Nội</label>
                      </div>
            
                      <div class="option">
                        <input type="radio" class="radio" id="HCM" name="category" value="0"/>
                        <label for="HCM">Hồ Chí Minh</label>
                      </div>
            
                      <div class="option">
                        <input type="radio" class="radio" id="CT" name="category" value="0.15"/>
                        <label for="CT">Cần Thơ</label>
                      </div>
            
                      <div class="option">
                        <input type="radio" class="radio" id="LA" name="category" value="0.08"/>
                        <label for="LA">Long An</label>
                      </div>
            
                      <div class="option">
                        <input type="radio" class="radio" id="TV" name="category" value="0.20"/>
                        <label for="TV">Trà Vinh</label>
                      </div>
            
                      <div class="option">
                        <input type="radio" class="radio" id="VL" name="category" value="0.10" />
                        <label for="VL">Vĩnh Long</label>
                      </div>
            
                      <div class="option">
                        <input type="radio" class="radio" id="HG" name="category" value="0.15" />
                        <label for="HG">Hậu Giang</label>
                      </div>
            
                      <div class="option">
                        <input type="radio" class="radio" id="BT" name="category" value="0.25"  />
                        <label for="BT">Bến Tre</label>
                      </div>
            
                      <div class="option">
                        <input type="radio" class="radio" id="CM" name="category" value="0.5"/>
                        <label for="CM">Cà Mau</label>
                      </div>
                     
                    </div>
                </div>
                <div class="TextCheckin">
                    <p class="TextCheck">Phí Vận Chuyển : đ</p><p class="TextCheck" id="Count"></p>
                </div>
                        </div>
                        </div>
                    <div class="Contain_Button_Buy">
                    <button type="Submit" id="Button_Buy" name="Buy" > Đồng ý mua </button>

                </div>
            </form>
                        
                ';
    ?>

                
</div>
<?php
    include 'Bottom.php';
?>

   <script type="text/javascript" src="Js/Select2.js"></script>
</body>