
function getComboA(sel) {
    let name = sel.options[sel.selectedIndex].text;
    let value = sel.options[sel.selectedIndex].value;
    $.post("../back_end/update_cat.php",{
            category: name,
            prod_id: value
        },setTimeout(location.reload.bind(location), 100));
};

function getComboCart(sel) {
    let value = sel.options[sel.selectedIndex].text;
    let id = sel.options[sel.selectedIndex].value;    
    $.post("cart.php",{
            quantity: value,
            id: id,
            test: '1234'
        },setTimeout(location.reload.bind(location), 100));
};

$("#cat_nav li").click(function() {
    let name = $(this).text(); 
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
        $(document).on('click', 'li', function(){
            $("#search_cat_navbar").val($(this).text())
            $("#s_paragraph").fadeOut();
        });
    });
    
});

/* star-rating */
$('.modal-review__rating-order-wrap > span').click(function() {
    $(this).addClass('active').siblings().removeClass('active');
    $(this).parent().attr('data-rating-value', $(this).data('rating-value'));
    let rating = $(this).data('rating-value');
    var val = this.getAttribute('data-value');
    $.post("../back_end/rating_back.php",{
        star: rating,
        id: val
    });
});