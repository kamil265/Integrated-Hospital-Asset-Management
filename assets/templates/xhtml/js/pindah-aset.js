function getUser() {
    $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getUser.php",
        data:'uid_penanggungjawab='+$("#uid_penanggungjawab").val(),
        type: "POST",
        success:function(data)
        {
            $("#get_user_name").html(data);
            $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
    }


    $('.getDetailPj').on('click', function() {
        var $val = $('#get_uidPj').html();
        $('#showuid').text($val);
    });     