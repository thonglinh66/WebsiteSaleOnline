var KichThuoc = document.getElementsByClassName("Image_body")[0].clientWidth;
var ChuyenImage = document.getElementsByClassName("Image_Stranfer")[0];
var Image = document.getElementsByClassName("ContentImage");
var MaxSize = KichThuoc * (Image.length-1);
var chuyen  = 0;
var dem = 1;
var temp =2000;
document.getElementById("img"+dem).checked = true;
function Next(){
	if(chuyen < MaxSize){
		chuyen +=KichThuoc;
		dem ++;
	}else{
		chuyen = 0;
		dem = 1;
	}
	ChuyenImage.style.marginLeft = '-' + chuyen + 'px';
	document.getElementById("img"+dem).checked = true;
}

function Back(){
	if(chuyen == 0) {
		chuyen =MaxSize;
	}
	else
		chuyen -=KichThuoc;
	ChuyenImage.style.marginLeft = '-' + chuyen + 'px';
		
}

function ClickChoose1(){
	var i = 0;
	document.getElementById("img1").checked = true;
	chuyen = i * KichThuoc;
	ChuyenImage.style.marginLeft = '-' + chuyen + 'px';
	dem  = i+1;
	temp = 10000;
}
function ClickChoose2(){
	var i = 1;
	document.getElementById("img2").checked = true;
	chuyen = i * KichThuoc;
	ChuyenImage.style.marginLeft = '-' + chuyen + 'px';
	dem  = i+1;
	temp = 10000;
}
function ClickChoose3(){
	var i = 2;
	document.getElementById("img3").checked = true;
	chuyen = i * KichThuoc;
	ChuyenImage.style.marginLeft = '-' + chuyen + 'px';
	dem  = i+1;
	temp = 10000;
}
function ClickChoose4(){
	var i = 3;
	document.getElementById("img4").checked = true;
	chuyen = i * KichThuoc;
	ChuyenImage.style.marginLeft = '-' + chuyen + 'px';
	dem  = i+1;
	temp = 10000;
}
function ClickChoose5(){
	var i = 4;
	document.getElementById("img5").checked = true;
	chuyen = i * KichThuoc;
	ChuyenImage.style.marginLeft = '-' + chuyen + 'px';
	dem  = i+1;
	temp = 10000;
}
setInterval(function(){
	Next();
},temp);

