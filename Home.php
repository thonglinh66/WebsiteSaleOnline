

<?php
    session_start();
	$Database_host ='localhost';
	$Database_user ='root';
	$Database_pass = '';
	$Database_name = 'quanlybanhang';
    $con = mysqli_connect($Database_host,$Database_user,$Database_pass,$Database_name) or die ('Kết nối thất bại');
    
?>
<?php
    
    if(isset($_GET['username']))
    {  
        $username = "username=".$_GET['username'];
    }else if(!isset($_GET['username'])){
        $username = "";
    }
?>
<head>
    <title>ShopLyon</title>
    <meta charset="UTF-8">
    <link href="Css/Top.css" rel="stylesheet">
    <link href="Css/Home.css" rel="stylesheet">
    <link href="Css/LoginUser.css" rel="stylesheet">
    <link href="Css/Product.css" rel="stylesheet">
    <link href="Css/Bottom.css" rel="stylesheet">
    <link href="Css/all.min.css" rel="stylesheet">
    <link href="Css/fontawesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="Js/Load.js"></script>
    <script type="text/javascript" src="js/ jquery.min.js"></script>
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
<body onload="Load();">
    <?php 
        include 'Top.php';
    ?>
    <div class="BodyConten">
         <div class="BackGround_Body">
            <div class="Image_body">
                <div class="direction">
                    <i class="fa fa-chevron-circle-left" onClick="Back();"></i>
                    <i class="fa fa-chevron-circle-right" onClick="Next();" ></i>
                </div>
                <div class="Background-choose">
                    <input type="radio" name="Choose" id="img1" onClick="ClickChoose1();">
                    <input type="radio" name="Choose" id="img2" onClick="ClickChoose2();">
                    <input type="radio" name="Choose" id="img3" onClick="ClickChoose3();">
                    <input type="radio" name="Choose" id="img4" onClick="ClickChoose4();">
                    <input type="radio" name="Choose" id="img5" onClick="ClickChoose5();">
    
                </div>
                <div class="Image_Stranfer">
                    <img src="Image/Balo.jpg" alt="1"  class="ContentImage" id="1">
                    <img src="Image/dtSamsung.jpg" alt="2" class="ContentImage" id="2">
                    <img src="Image/Giaynam.png" alt="3" class="ContentImage" id="3">
                    <img src="Image/Iphone.jpg" alt="4" class="ContentImage" id="4">
                    <img src="Image/Laptop.jpg" alt="5" class="ContentImage" id="5">
                </div>
            </div>
            
        </div>
        <div class="Check">
            <ul>
                <li><a class="CheckItem" href="#">  <i class="fa fa-home"></i> <p>Mua tại nhà</p> </a></li>
                <li><a class="CheckItem" href="#">  <i class="fa fa-money-bill-alt"></i> <p>Chỉ 1 đồng </p></a></li>
                <li><a class="CheckItem" href="#">  <i class="fa fa-truck"></i> <p>Freeship TMTShip</p>  </a></li>
                <li><a class="CheckItem" href="#">  <i class="fa fa-globe-americas"></i> <p>Hàng Quốc tế</p></a></li>
                <li><a class="CheckItem" href="#">  <i class="fa fa-shopping-bag"></i> <p>TMT Mall</p></a></li>
                <li><a class="CheckItem" href="#">  <i class="fa fa-gamepad"></i> <p>TMT Game</p></a></li>
                <li><a class="CheckItem" href="#">  <i class="fa fa-user-friends"></i> <p>TMT's Club</p></a></li>
                <li><a class="CheckItem" href="#">  <i class="fa fa-tv"></i> <p>Siêu thị điện thử</p></a></li>
                <li><a class="CheckItem" href="#">  <i class="fa fa-shopping-cart"></i> <p>Siêu thị TMT Mart</p></a></li>
                <li><a class="CheckItem" href="#">  <i class="fa fa-coins"></i> <p>Săn coin mõi ngày</p></a></li>
            </ul>
        </div> 
    </div>
    <div class="Introl" style=" background: url(Image/IntrolSale.png) no-repeat;width: 80%;  background-size: 100% 150px; float: left; height: 150px; margin-top: 30px; margin-left: 10%;">

    </div>
    <div class="ListItem">
        <div class="TitleIntro"><h1> DANH MỤC</h1></div>
        <ul>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/AoThun.png" alt="non"> <p>Áo thun nam</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/Laptop.jpg" alt="laptop"> <p>Laptop</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/dtSamsung.jpg" alt="dienthoai"> <p>Điện thoại</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image//ManGiay.jpg"> <p>giày nam</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/thietbigiadung.jpg" alt="tbgd"> <p>Thiết bị gia dụng</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/thethao.jpg" alt="thethao"> <p>Thể Thao</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/mayanh.jpg" alt="non"> <p>Máy ảnh, quay phim</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/xemay.jpg" alt="non"> <p>Xe máy</p></a></li>

        </ul>
        <ul>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/aonu.jpg" alt="non"> <p>Áo nữ</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/noithat.jpg" alt="non"> <p>Trang trí nội thất</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/son.jpg" alt="non"> <p>Làm đẹp</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/momandson.jpg" alt="non"> <p>Mẹ và bé</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/giaydep.jpg"> <p>giày nữ</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/giaycaogot.jpg" alt="non"> <p>Giày cao gót</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/clock.jpg" alt="non"> <p>Đồng hồ</p></a></li>
            <li> <a class="ChooseItem"><img class="ImgItem" src="Image/non.jpg" alt="non"> <p>Nón Nam,Nữ</p></a></li>      
        </ul>
    </div>
    <div class="Recomand">
        <div class="ChooseMenu">
        <ul>
            <li>
                <a class="PickedMenu" id="Menu1" href="#A" onclick="Change('Menu1');">
                    <div class="Menu" ><span style="font-weight: bold; font-size: 20px; color: black;margin-top: 10px; float: left; margin-left: 50px;">GỢI Ý HÔM NAY</span></div>
                    <div class="ColorMenu" id="Color1"> </div>
                 </a>
            </li>
            <li>
                <a class="PickedMenu" id="Menu2" href="#A" onclick="Change('Menu2');">
                    <div class="Menu" ><span style="font-weight: bold; font-size: 20px; color: black;margin-top: 10px; float: left; margin-left: 50px;">HÀNG SALE HÔM NAY</span></div>
                    <div class="ColorMenu" id="Color2"> </div>
                 </a>
            </li>
        </ul>
        </div>
        <?php
                if(isset($_GET['text'])){
                    $text = $_GET['text'];
                    $text = "%".$_GET['text']."%";
                    $mySql =  "SELECT * FROM `hanghoa` WHERE TenHH like '$text'";
                }else{
                    $mySql =  "SELECT * FROM `hanghoa`";
                }
                $result  = mysqli_query($con,$mySql);
                if(mysqli_num_rows($result) == 0){
                    echo '<h1> Khong co san pham </h1>';
                }else{
                    while($rows = mysqli_fetch_assoc($result)){
                        $IdProduct = $rows["MSHH"];
                        $name = $rows["TenHH"];
                        $Money = $rows["Gia"];
                        $mySqlsl =  "SELECT COUNT(SoLuong) FROM `chitietdathang` WHERE MSHH = '$IdProduct'";
                        $resultsl  = mysqli_query($con,$mySqlsl);
                        $rowsl = mysqli_fetch_assoc($resultsl);
                        $sl = $rowsl["COUNT(SoLuong)"];
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
                    }
                }
                
            ?>
        
     </div>
    <!-- <div class="Trending">
    </div> -->
    <?php 
        include 'Signup_Login.php';
    ?>
    <?php 
    
    include 'Bottom.php';
    ?>
    
    <script type="text/javascript" src="Js/Transfer.js"></script>
    <script type="text/javascript">
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
        function ClickItem(StringUrl){
            var name = "<?php echo $username ?>";
            var character ="";
            if(name != ""){
                character = "&";
            }
        url = "Infor.php?idProduct="+StringUrl+character+name;
        window.open("http://localhost/WebsiteSaleOnline/"+url);
    }
    </script>
</body>
