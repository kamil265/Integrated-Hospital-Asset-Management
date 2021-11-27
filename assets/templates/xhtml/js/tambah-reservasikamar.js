function getReservasiKamar() {
    $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getReservasiKamar.php",
        data:'uid_reservasikamar='+$("#uid_reservasikamar").val(),
        type: "POST",
        success:function(data)
        {
            $("#get_data_reservasikamar").html(data);
            $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
    }