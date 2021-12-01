$(document).ready(function() {

    $("#btnGetUid").click(function() {
    getPemindahanPasien();
    });

});

//Method 1
function getPemindahanPasien()
{
    jQuery.ajax({
    url: "getPemindahanPasien.php",
    dataType:'json',
    success:function(response)
    {
        show(response);
    }
    });
}

function show(data) {
    document.getElementById('resultPemindahanPasien').setAttribute('value',data[0].kode_rfid);
  }
//   function show(data) {
//     document.getElementById('resultPemindahanPasien').setAttribute('value',data[0].rfid_uid);
//   }