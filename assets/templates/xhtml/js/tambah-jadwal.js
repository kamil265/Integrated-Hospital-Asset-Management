function getDokter() {
    // $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getDokter.php",
        data:'nama_dokter='+$("#nama_dokter").val(),
        type: "POST",
        success:function(data)
        {
            $("#uid_jadwaldok").html(data);
            // $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
    }
function getPerawat(){
    $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getPerawat.php",
        data:'uid_jadwalprwt='+$("#uid_jadwalprwt").val(),
        type: "POST",
        success:function(data)
        {
            $("#get_data_perawat").html(data);
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
        data:'uid_jadwalkar='+$("#uid_jadwalkar").val(),
        type: "POST",
        success:function(data)
        {
            $("#get_data_karyawan").html(data);
            $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
    }