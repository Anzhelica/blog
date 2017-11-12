var avatarElem = document.getElementById('categories');
var avatarElem2 = document.getElementById('fix');
var avatarSourceBottom = avatarElem.getBoundingClientRect().bottom + window.pageYOffset;
var menu = document.getElementsByTagName('main');
window.onscroll = function() {
    var h = $('main').css('height');
    h=h.replace("px", '');
    if(h>1780) {
        if (avatarElem2.classList.contains('fixed') && window.pageYOffset < avatarSourceBottom) {
            avatarElem2.classList.remove('fixed');
        } else if (window.pageYOffset > avatarSourceBottom) {
            avatarElem2.classList.add('fixed');
        }
    }
};
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
function getMonth(i) {
    if(i==0){return ' Января';}
    if(i==1){return ' Февраля';}
    if(i==2){return ' Марта';}
    if(i==3){return ' Апреля';}
    if(i==4){return ' Мая';}
    if(i==5){return ' Июня';}
    if(i==6){return ' Июля';}
    if(i==7){return ' Августа';}
    if(i==8){return ' Сентября';}
    if(i==9){return ' Октября';}
    if(i==10){return ' Ноября';}
    if(i==11){return ' Декабря';}

}

(function($) {
    var t = document.getElementsByTagName('time');
    for(var i = 0; i<t.length;i++){
        var date = new Date( t[i].innerText);
        var str = getMonth(date.getMonth());
        t[i] = t[i].innerText=date.getDate()+str +" "+date.getFullYear()+" в "+date.getHours()+":"+date.getMinutes();
    }
})(jQuery);