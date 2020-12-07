$(document).ready(function(){
    $('#partner').change(function(){
        var value = $(this).val()
        if(value == 0){
            $(".changeInput").prop("disabled",true);
        }else{
            $(".changeInput").prop("disabled",false);
        }
    })
    $(".addDay").click(function () {
        $("#hiddenSaturdayForm").css("display","block");
    })
})
