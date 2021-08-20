
function getComboA(e) {
    let value = e.value;  
    console.log(value);
    $.post("../back_end/update_cat.php",{
            category: value
        },function(data,status){
            $("#salam").html(data);
        });
};

