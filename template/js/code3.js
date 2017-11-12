$(".likes").mouseover('.likes', function (event) {
    //$('.like-container').show();
    var t = event.currentTarget;
    var t2 = t.firstElementChild;
    t2.style.display = 'inline-block';
});
$(".likes").mouseout('.like-container', function (event) {
    $('.like-container').hide();
});

$(".like-container").hover(function () {
    alert($this);
    this.css('display', 'block');
    //  div.style.display='block';
    //   div.display='block';
});
$(".like-container").on(".like-container", '.likes', function () {
    var div = $(this).previousElementSibling;
    //  div.style.display='block';
    div.display = 'none';
});


function addReply(p1) {
    {

        //   p1.removeChild(el[0]);
        var div = document.createElement('div');
        div.className = ('form-for-reply');
        var h3 = document.createElement('h3');
        h3.innerText = ('Напишите Ваш комментарий');
        var form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.innerHTML = ('<textarea name="text"></textarea><div class="reply-button"><input type="submit" id="ok" name="submit"></div>');
        div.appendChild(h3);
        div.appendChild(form);
        var p = p1.parentNode;
        p = p.parentNode;
        p = p.parentNode;
        var el = p.getElementsByClassName('form-for-reply');
        if (el[0]) {
            p.removeChild(el[0]);
        }
        else
            p.appendChild(div);
    }
}

var count = 0;
var add = document.getElementById('add_more_category');
var parent = document.getElementById('main-write1');
add.onclick = function () {
    var str = document.createElement('div');//"";
    str.innerHTML = '<input type="text" id="category' + count + '"name="category[]" required="required"' + '><label class="close-category">X</label>';
    var before = document.getElementById('add_more');
    str.style.marginLeft = '14%';
    str.style.width = '99.5%';
    parent.insertBefore(str, before);
    count++;
};
var close = document.getElementById('container-write');

(function ($) {
    $(document).ready(function () {
        $("body").on("click", ".close-category", function () {
            var input = this.previousElementSibling;
            var inputatr = input.id;
            var del = document.getElementById(inputatr);
            $(del).remove();
            $(this).remove();
        });

    });
})(jQuery);
