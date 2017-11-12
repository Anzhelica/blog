var arr = document.getElementsByClassName('short');
var str="";
var len=0;
for(var i = 0; i<arr.length; i++){
    str = arr[i].innerHTML;
    if(str.length > 26){
      //  len = str.length;
   len = 26;}
    else  len = str.length;
    str = str.slice(0,len);
    arr[i].innerHTML=str+'...';
    len=0;
}
var arr = document.getElementsByClassName('p');
var str="";
var len=0;
for(var i = 0; i<arr.length; i++){
    str = arr[i].innerHTML;
    if(str.length < 50)
        len = str.length;
    if(str.length>50 && str.length<120)
        len= (((str.length)/2)/2);
    if(str.length>=120)
        len= (((str.length)/2)/2)/2;
    str = str.slice(0,len);
    arr[i].innerHTML=str+'...';
    len=0;
}