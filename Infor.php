

<?php
	$Database_host ='localhost';
	$Database_user ='root';
	$Database_pass = '';
	$Database_name = 'quanlybanhang';
	$con = mysqli_connect($Database_host,$Database_user,$Database_pass,$Database_name) or die ('Kết nối thất bại');
    $IDProduct = $_GET["idProduct"];
    $ArrayPro = array();
    $SQLQuery = "SELECT * FROM `hanghoa` WHERE `MSHH` = '$IDProduct'";
    $Result = mysqli_query($con,$SQLQuery);
    while($rows = mysqli_fetch_assoc($Result)){
        $name = $rows["TenHH"];
        $Money = $rows["Gia"];
        $Count = $rows["SoLuongHang"];
        $Group = $rows["MaNhom"];
        $mySqlsl =  "SELECT COUNT(SoLuong) FROM `chitietdathang` WHERE MSHH = '$IDProduct'";
        $resultsl  = mysqli_query($con,$mySqlsl);
        $rowsl = mysqli_fetch_assoc($resultsl);
        $sl = $rowsl["COUNT(SoLuong)"];
        $Img = $rows["Hinh"];
    }
?>
<?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    if(isset($_GET['username']))
    {
        session_start();
        $stat = "1";
        $username = $_GET['username'];

    }else 
    if(!isset($_GET['username'])){
        $stat = "0";
        $username = "null";
    }
?>
<?php 
        include 'Signup_Login.php';
    ?>
<?php
    if(isset($_POST['Store'])&&(isset($_GET['username']))){
        if($_POST['Count_Saled'] > $Count ){
            echo '<script>alert("Hàng trong kho chỉ còn : '.$Count.'" )</script>';
            echo "<script> window.history.back();</script> " ; 
        }else
        {
            if(isset($_SESSION['cart'])){
                $item_array_id = array_column($_SESSION['cart'], "product_id");
                if(in_array($IDProduct, $item_array_id)){
                    echo "<script>alert('Sản phẩm đã được thêm')</script>";
                    echo "<script> window.history.back();</script> " ; 
                }else{
                    $count =  count($_SESSION['cart']);
                    $item_array = array(
                        'product_id' => $IDProduct,
                        'count' => $_POST['Count_Saled']
                    );          
                    $_SESSION['cart'][$count] = $item_array;
                    echo "<script>alert('Đã Thêm Sản Phẩm Vào Giỏ Hàng')</script>";
                    echo "<script> window.history.back();</script> " ; 
                }
            }
            else{
                $item_array = array(
                    'product_id' => $IDProduct,
                    'count' => $_POST['Count_Saled']
                );
                $_SESSION['cart'][0] = $item_array;
                echo "<script>alert('Đã Thêm Sản Phẩm Vào Giỏ Hàng')</script>";
                echo "<script> window.history.back();</script> " ; 
            }
           
        }
    }
    else if(isset($_POST['Store'])&&(!isset($_GET['username'])))
    {
        echo "<script> 
            var modal = document.getElementById('id01');
            modal.style.display='block';
            </script>";
    }
    if(isset($_POST['Buy'])&&(isset($_GET['username']))){
        if($_POST['Count_Saled'] > $Count ){
            echo '<script>alert("Hàng trong kho chỉ còn : '.$Count.'" )</script>';
            echo "<script> window.history.back();</script> " ; 
        }else
        {
            if(isset($_SESSION['cart'])){
                $item_array_id = array_column($_SESSION['cart'], "product_id");
                if(in_array($IDProduct,$item_array_id)){
                    $herf = "/WebsiteSaleOnline/Buy.php?username=".$username;
                    echo '<script> window.location = "'.$herf.'"</script> ' ;  
                }else{
                    $count =  count($_SESSION['cart']);
                    $item_array = array(
                        'product_id' => $IDProduct,
                        'count' => $_POST['Count_Saled']
                    );          
                    $_SESSION['cart'][$count] = $item_array;
                }
               
            }
            else{
                $item_array = array(
                    'product_id' => $IDProduct,
                    'count' => $_POST['Count_Saled']
                );
                $_SESSION['cart'][0] = $item_array;
            }
            $herf = "/WebsiteSaleOnline/Buy.php?username=".$username;
            
            echo '<script> window.location = "'.$herf.'"</script> ' ; 
        }   
    }else if(isset($_POST['Buy'])&&(!isset($_GET['username'])))
    {
        echo "<script> 
            var modal = document.getElementById('id01');
            modal.style.display='block';
            </script>";
    }
?>
<head>
    <title>ShopLyon</title>
    <meta charset="utf-8" />
    <link href="Css/Top.css" rel="stylesheet">
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
</head>
<body >

    <?php 
        include 'Top.php';
        
    ?>
    <form action="<?php echo $actual_link?>" method="post" class="BodyContent"> 
        <?php
            echo'
            <div class="ContainItem">
                <div class="ImgItem" id="Img">
                    <img src="'.$Img.'">
                </div>
                <div class="Button">
                    <i class="fa fa-arrow-left button" onclick="BackList()"></i>
                    <i class="fa fa-arrow-right button" onclick="NextList()"></i>       
                </div>
                <div class="ListImg" id="ListImg">
                    <img class="listImgItem" src="'.$Img.'">
                    <img class="listImgItem" src="Image/White.png">
                    <img class="listImgItem" src="Image/White.png">
                    <img class="listImgItem" src="Image/White.png">
                    <img class="listImgItem" src="Image/White.png">
                    <img class="listImgItem" src="Image/White.png">
                </div>
        </div>
        <div class="Information">
            <h1 class="Title">'.$name.'</h1>
            <div class="Rate">
                <div class="Star"> <p class="count"> 4.5</p>
                    <div class="iStar">
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="Cmt"> <p class="count"> 225</p>  <p>Đánh Giá</p>
               </div>
               <div class="Saled"> <p class="count">'.$sl.'</p>  <p>Đã Bán</p>
               </div>              
            </div>
            <div class="CountMoney">
                <p>đ</p> <p class="Money" id="MoneyItem">'.$Money.'</p>
            </div>
            <div class="Tranfer">
                <div class="off">
                    <p class="TextFont">Vận Chuyển</p>
                    <p class="Free">Free</p>
                    <div class="FontTextSale">
                        <p class="FreeSale" >Miễn Phí Vận Chuyển</p>
                    <p class="TextSale">
                        Miễn Phí Vận Chuyển khi đơn đạt giá trị tối thiểu</p> 
                    </div>
                    
                </div>
                <div class="Checkin">
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
            <div class="CountMany">
                <p class="TextFont">Số Lượng</p>
                <div class="ButtonCout">
                    <div class="UpDown" id="Down" onclick="Down();"><i class="fa fa-minus"></i></div>
                    <input id="CountOne" type="text" name="Count_Saled"value="1">
                    <div class="UpDown" id="Up" onclick="Up();"><i class="fa fa-plus"></i></div>
                </div>
            </div>
            <div class="ButtonBuy">
                <button type="submit" onclick="Check_Store();" class="addStore" name="Store" >
                    <i class="fa fa-shopping-basket"></i><p> Thêm Vào Giỏ Hàng</p>
                </button>
                <button type="submit" onclick="Check_Buy();" class="addStore" name="Buy" >
                     <p> Mua ngay</p>
                </button>
             </div>
            </div>
        
            </div>';
        ?>
    </form>
    
    <div class="MoreProduct">
            <div class="TitleMore"><h1>Sản phẩm liên quan </h1></div>
            <div class="ContainProduct">
            <?php
                $mySql =  "SELECT * FROM `hanghoa` WHERE `MSHH` <> '$IDProduct' AND `MaNhom` = '$Group'";
                $result  = mysqli_query($con,$mySql);
                if(mysqli_num_rows($result) == 0){
                    echo '<h1> Khong co san pham </h1>';
                }else{
                    for($i = 0; $i <= 5; $i++){
                        if($rows = mysqli_fetch_assoc($result)){
                        $IdProduct = $rows["MSHH"];
                        $name = $rows["TenHH"];
                        $Money = $rows["Gia"];
                        $CountProduct = $rows["SoLuongHang"];
                        $mySqlsl =  "SELECT COUNT(SoLuong) FROM `chitietdathang` WHERE MSHH = '$IdProduct'";
                        $resultsl  = mysqli_query($con,$mySqlsl);
                        $rowsl = mysqli_fetch_assoc($resultsl);
                        $sl = $rowsl["COUNT(SoLuong)"];
                        if($username == "null"){
                            echo'
                            <div class="IntroITem" id="'.$IdProduct.'" onclick="ClickItem(id);">
                                <div class="MoreImage">
                                <img class="ImgIntroItem" src="'.$rows["Hinh"].'" alt="non"> 
                                <div class="SaleOn"><span style="float: left; color: rgba(247, 59, 59, 0.89); margin-left: 6px; font-size: 18px; font-weight: bold;">99%</span><span style="float: left; color: white; margin-left: 3px; font-size: 16px; font-weight: bold;">GIẢM</span></div>
                                </div>
                                <div class="IntroText">'.$name.'</div>
                                <div class="count"> <p class="Moneydong">đ</p> <p class="Money">'.$Money.'</p> </div>
                                <div class="countSaled"> <p class="NumSaled">Đã bán:</p> <p class="NumSaled">'.$sl.'</p></div>
                            </div>';
                        }else{
                            echo'
                            <div class="IntroITem" id="'.$IdProduct.'&username='.$username.'" onclick="ClickItem(id);">
                                <div class="MoreImage">
                                <img class="ImgIntroItem" src="'.$rows["Hinh"].'" alt="non"> 
                                <div class="SaleOn"><span style="float: left; color: rgba(247, 59, 59, 0.89); margin-left: 6px; font-size: 18px; font-weight: bold;">99%</span><span style="float: left; color: white; margin-left: 3px; font-size: 16px; font-weight: bold;">GIẢM</span></div>
                                </div>
                                <div class="IntroText">'.$name.'</div>
                                <div class="count"> <p class="Moneydong">đ</p> <p class="Money">'.$Money.'</p> </div>
                                <div class="countSaled"> <p class="NumSaled">Đã bán:</p> <p class="NumSaled">'.$sl.'</p></div>
                            </div>';
                        }
                        
                        }
                    
                    }
                }
                
            ?>
            </div>
    </div>
    <?php 
        include 'Bottom.php';
    ?>
    <script type="text/javascript" src="Js/ListImage.js"></script>
    <script type="text/javascript" src="Js/Select.js"></script>
    <script>
        var modal = document.getElementById('id01');

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        var modal = document.getElementById('id02');

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        function Up(){
            var getCount = document.getElementById('CountOne').value;
            var temp = Number(getCount) + 1;
            document.getElementById('CountOne').value = temp;
        }
        function Down(){
            var getCount = document.getElementById('CountOne').value;
            if( getCount > 0){
                var temp = Number(getCount) - 1;
                document.getElementById('CountOne').value = temp;
            }
        }
    </script>
     <script>
        function ClickItem(StringUrl){
            url = "?idProduct="+StringUrl;
            window.open(url);
        }
    </script>
</body>
