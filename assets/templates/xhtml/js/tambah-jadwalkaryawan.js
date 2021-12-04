function getJadwalKaryawan() {
    $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getJadwalKaryawan.php",
        data:'nama_jadwalkar='+$("#nama_jadwalkar").val(),
        type: "POST",
        success:function(data)
        {
            $("#get_data_karyawan").html(data);
            $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
    }