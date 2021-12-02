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
    $("#get_uidPemindahanPasien").html(data[0].kode_rfid);
//    $("#get_uid").setAttribute('value',data[0].rfid_uid);

    // document.getElementById('get_uid').html(data[0].rfid_uid);
  }

