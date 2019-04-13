function AddQuantity(){
    var quantity = $('#ProdQuant').val();

    if(quantity < 1){
        quantity = 0;
    }

     var href = $("#CartLink").attr("href");
     $("#CartLink").attr("href", href + '&Quantity=' + quantity);
}

$(document).ready(function(){

    $('.viewbtn').on('click', function(){
        $('.viewbtn').removeClass('btn-primary');
        $(this).addClass('btn-primary');
    });

});