$(document).ready(function(){
    var value = $("#partner").val();
    if(value == "Այո"){
        $(".bigdiv").show();
        $(".changeInput").prop("disabled",false);
    }else if(value == "Ոչ") {
        $(".bigdiv").hide();
        $(".changeInput").prop("disabled", true);
    }

    $('#partner').change(function(){
        var value = $(this).val()
        if(value == "Ոչ"){
            $(".changeInput").prop("disabled",true);
            $(".bigdiv").hide();
        }else if(value == "Այո"){
            $(".changeInput").prop("disabled",false);
            $(".bigdiv").show();
        }
    })
    $(".addDay").click(function () {
        $("#hiddenSaturdayForm").css("display","block");
        $(this).removeClass("addDay");
        $(this).addClass("minus");
        $(".minus").on('click', function () {
            $("#hiddenSaturdayForm").css("display","none");
            $(this).removeClass("minus");
            $(this).addClass("addDay");
        })
    })


})
