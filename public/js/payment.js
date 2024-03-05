$(document).ready(function(){
    $("form").submit(function(e){

        var data = {
            nickname: $("#nickname"),
            email: $("#email"),
            additional: $("#additional"),
            quantity: $("#slider")
        }

        $.ajax({
            type: "POST",
            url: "payment/create",
            data: data,
            dataType: "JSON",
            success: function(data){
                console.log(data);
            }
        });
    }
})