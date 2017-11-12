var count=0;
var add = document.getElementById('add_more_category');
var parent = document.getElementById('main-write1');
add.onclick =  function () {
    var str=document.createElement('div');//"";
    str.innerHTML='<input type="text" class="categoryOne'+count+'" name="category[]" required="required"'+'><label class="close-category">X</label>';
    var before = document.getElementById('add_more');
    str.style.marginLeft='0';
    str.style.width='99.5%';
    parent.insertBefore(str,before);
    count++;
};
var close = document.getElementById('container-write');

(function($) {
    $(document).ready(function() {
        $("body").on("click", ".close-category", function() {
            var input=this.previousElementSibling;
            var inputatr=input.className;
            var del = document.getElementsByClassName(inputatr);
            $( del[0] ).remove();
            $(this).remove();
        });

    });
})(jQuery);
