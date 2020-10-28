<div id="id01" class="modal">
  
        <form class="modal-content animate" action="PHP/AuthenticationUser.php" method="post">
            <span class="login">Đăng Nhập</span><span class="signup"><a href="#" onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'">Đăng ký</a></span>
          <div class="container">
            <input type="text" placeholder="Nhập số điện thoại/Email" name="uname" required>
            <input type="password" placeholder="Nhập Mật Khẩu" name="psw" required>
            <span class="psw"> <a href="#"  target="_blank" >Quên Mật Khẩu</a></span>
            <span class="help"> <a href="#"  target="_blank" >Cần Trợ Giúp</a></span>
            <button type="submit" name="Login">Đăng nhập </button>
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            
          </div>
        </form>
      </div>

      <div id="id02" class="modal">
  
        <form class="modal-content animate" action="PHP/Register.php" method="post">
            <span class="login">Đăng ký</span><span class="signup"><a href="#" onclick="document.getElementById('id01').style.display='block';document.getElementById('id02').style.display='none'" >Đăng Nhập</a></span>
          <div class="container">
            <input type="text" placeholder="Nhập số điện thoại" name="phone" class="inputText" required>
            <input type="text" placeholder="Tên Đăng Nhập" name="uname" class="inputText" required>
            <input type="text" placeholder="Nhập Họ Tên" name="name" class="inputText" required>
            <input type="text" placeholder="Nhập Địa Chỉ" name="addres" class="inputText" required>
            <div class="captcha">
                <input type="text" placeholder="Nhập mã captcha" name="captcha">
                <img src="images.php" id="captcha_image" />
            </div>  
            <input type="password" placeholder="Nhập Mật Khẩu" name="psw" required>
            <span class="psw"> <a href="#"  target="_blank" >Muốn Biết Thêm Về Điều Khoảng</a></span>
            <button type="submit">Đăng Ký</button>
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
            
          </div>
        </form>
      </div>
      