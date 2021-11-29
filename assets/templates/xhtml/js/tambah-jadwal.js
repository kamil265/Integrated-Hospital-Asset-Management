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