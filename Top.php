
    <div class="Header" >
        <div class="TopHeard">
            <div class="More">
                <ul>
                    <li><a class="Item" href="#">Kênh người bán</a></li>
                    <li><a class="Item" href="#">Tải ứng dụng</a></li>
                    <li><a class="Item">Kết nối</a></li>
                    <li><a class="Item" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a> </li>
                    <li><a class="Item" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"  ></i></a></li>
                </ul>
            </div>
            <div class="MoreHelp">
                <ul>
                    <li><a class="Item" href="#">Thông báo  <i class="fas fa-bell" aria-hidden="true"></i></a></li>
                    <li><a class="Item" href="#">Trợ giúp  <i class="fas fa-question-circle" aria-hidden="true"></i></a></li>
                    <?php
                    if(isset($_SESSION["username"])){
                        if(($_SESSION["username"]) == "")
                        {
                            echo ' <li><a class="Item" href="#"onclick="clickOne()">Đăng ký</a></li>
                            <li><a class="Item" href="#" onclick="clickTwo()">Đăng nhập</a></li>';
                        }
                        
                        else if(($_SESSION["username"]) !="")
                        { 
                            $IdUser = $_SESSION["username"];
                            $UserName = $IdUser;
                            $query = "SELECT * FROM `khachhang` WHERE `MSKH` = '$IdUser'";
                            $result = mysqli_query($con,$query);
                            while($rowst =  mysqli_fetch_assoc($result)){
                                $UserName = $rowst['HoTenKH'];
                            }
                            echo ' <li><a class="Item" href="#" >'.$UserName.'</a></li>
                            <li><a class="Item" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>';
                        }
                    }else{
                        echo ' <li><a class="Item" href="#"onclick="clickOne()">Đăng ký</a></li>
                            <li><a class="Item" href="#" onclick="clickTwo()">Đăng nhập</a></li>';
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
        <script>
            function clickOne(){
                document.getElementById('id02').style.display='block';
            }
            function clickTwo(){
                document.getElementById('id01').style.display='block';
            }
            function Out(){

            }
        </script>
        <div class="ContenHeard">
        <?php 
         if(isset($_SESSION["username"])){
            if(($_SESSION["username"]) == ""){
                echo'
                <a class="Logo" href="Home.php" ></a>';
            }else{
                echo'
                <a class="Logo" href="Home.php?username='.$_SESSION["username"].'" ></a>';
            }
        }else{
            echo'
            <a class="Logo" href="Home.php" ></a>';
        }
           ?>
            <div class="MainSearch">
                <form class="SeearchBox" action="home.php" method="get">
                    <input type="text" name="text" class="Search">
                    <button type="submit" name="submit" class="Submit"><i class="fa fa-search"></i></button>
                </form>
                
                <div class="Choose">
                    <ul>
                        <li><a class="Item" href="#">Giày Nam</a></li>
                        <li><a class="Item" href="#">Giày Em Bé</a></li>
                        <li><a class="Item" href="#">Áo Tay Dài</a></li>
                        <li><a class="Item" href="#">Quần Jean</a></li>
                        <li><a class="Item" href="#">Nón Kết</a></li>
                        <li><a class="Item" href="#">Khẩu Trang</a></li>
                        <li><a class="Item" href="#">Áo Khoác</a></li>
                        <li><a class="Item" href="#">Vali</a></li>
                    </ul>
                </div>  
            </div>
            <a class="Buy" href="#"><i class="fa fa-shopping-cart"></i></a> 
        </div>
    </div>  
