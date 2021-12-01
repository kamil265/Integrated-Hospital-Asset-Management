function getPemindahanPasien() {
    $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getPemindahanPasien.php",
        data:'uid_pemindahanpasien='+$("#uid_pemindahanpasien").val(),
        type: "POST",
        success:function(data)
        {
            $("#get_data_pemindahanpasien").html(data);
            $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
    }