function getDokter(){
    $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getDokter.php",
        data:'nama_jadwaldok='+$("#nama_jadwaldok").val(),
        type: "POST",
        success:function(data)
        {
            $("#get_data_dokter").html(data);
            $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
}
function getAsset() 
{
    $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "getAsset.php",
            data:'nama_aset='+$("#nama_aset").val(),
            type: "POST",
            success:function(data)
            {
                $("#get_nama_aset").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }

function getKaryawan() {
    $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getKaryawan.php",
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
 
function getJadwalPerawat(){
    $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getJadwalPerawat.php",
        data:'nama_jadwalper='+$("#nama_jadwalper").val(),
        type: "POST",
        success:function(data)
        {
            $("#get_data_perawat").html(data);
            $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
}

function getJadwalKaryawan(){
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