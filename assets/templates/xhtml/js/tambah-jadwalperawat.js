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