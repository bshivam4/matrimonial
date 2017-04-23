function getCity(stateid){
    $.ajax({
        url:"/getCity",
        data: {
            stateID : stateid
        },
        success : function(result){
            $("#city").html(result);
        }});

}