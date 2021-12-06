function getUID(){
    jQuery.ajax({
    url: "getUID.php",
    dataType:'json',
    success:function(response)
    {
        show(response);
    }
    });
}

function show(data) {
    $("#get_uidPas,#get_uidDok,#get_uidPerawat,#get_uidKar,#get_uidAset,#get_uidPj,#get_uidPasienRes,#get_uidPasienPindah").html(data[0].rfid_uid);
  }