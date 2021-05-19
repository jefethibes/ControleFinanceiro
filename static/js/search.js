$(function(){
    $("#mytable input").keyup(function(){
        var index = $(this).parent().index();
        var nth = "#mytable td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        $("#mytable tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });

    $("#mytable input").blur(function(){
        $(this).val("");
    });
});