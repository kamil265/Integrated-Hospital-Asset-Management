function getDokter() {
    // $("#loaderIcon").show();
    jQuery.ajax(
    {
        url: "getDetailDokter.php",
        dataType:'json',
        type: "POST",
        success:function(data)
        {
            showDokter(data)
            // $("#uid_jadwaldok").html('value',data);
            // $("#loaderIcon").hide();
        },
            error:function (){}
        }); 
    }
    function showDokter(data){
        $("#uid_jadwaldok").html(data[0].kode_rfid);

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