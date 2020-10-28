function Load(){
    document.getElementById("Menu1").focus();
    document.getElementById("Color1").style.opacity = "1";
}
function Change(StringFocus){
    document.getElementById(StringFocus).focus();
    if(StringFocus == "Menu1"){
        document.getElementById("Color1").style.opacity = "1";
        document.getElementById("Color2").style.opacity = "0";
    }else{
        if(StringFocus == "Menu2"){
            document.getElementById("Color2").style.opacity = "1";
            document.getElementById("Color1").style.opacity = "0";
        }
    }
}