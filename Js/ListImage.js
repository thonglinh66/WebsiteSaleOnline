var ImageItem = document.getElementById('Img');
var ImagePick  = document.getElementsByClassName('listImgItem');
for (var i = 0; i < ImagePick.length; i++){
    ImagePick[i].addEventListener('click', fullImage); 
}
function fullImage(){
    var Imagesrc =  this.getAttribute('src');
    ImageItem.innerHTML = "<img src="+Imagesrc+">";
}
var border = 3.65;
var FullImage = document.getElementsByClassName('listImgItem');
var KichThuocImage = document.getElementsByClassName('listImgItem')[0].clientWidth + border*2;
var maxsize = KichThuocImage * (FullImage.length-1)/4;
var Tranfer = document.getElementById('ListImg');
var chuyen = 0;

function NextList(){
    if(chuyen < maxsize){
        chuyen += KichThuocImage;
        Tranfer.style.marginLeft = '-'+ chuyen +'px';
    }
  
}
function BackList(){
    if(chuyen != 0){ 
        chuyen -= KichThuocImage;
        Tranfer.style.marginLeft = '-'+ chuyen +'px';
    }

}
