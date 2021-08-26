
function getComboA(sel) {
    let value = sel.options[sel.selectedIndex].text;
    console.log(value);
    $.post("../back_end/update_cat.php",{
            category: value
        });
};

function getComboCart(sel) {
    let value = sel.options[sel.selectedIndex].text;
    console.log(value);
    $.post("../back_end/cart_back.php",{
            quantity: value
        });
};

$("#cat_nav li").click(function() {
    let name = $(this).text(); 
    console.log(name);
    $.post("../back_end/cat_header_back.php",{
        cat: name
    });
    
});

$(document).ready(function(){
    $("#search_cat_navbar").keyup(function(){
        var nameCat = $(this).val();
        $.post("../back_end/search_category_nav.php", {
            suggestion: nameCat
        }, function(data){
            $("#s_paragraph").fadeIn();
            $("#s_paragraph").html(data);
        });
    });
    $(document).on('click', 'li', function(){
        $("#search_cat_navbar").val($(this).text())
        $("#s_paragraph").fadeOut();
    });
});
