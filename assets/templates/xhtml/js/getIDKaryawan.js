$(document).ready(function() {

    $("#btnGetUidKaryawan").click(function() {
    getKaryawanUID();
    });

});

//Method 1
function getKaryawanUID()
{
    jQuery.ajax({
    url: "getUidKaryawan.php",
    dataType:'json',
    success:function(response)
    {
        show(response);
    }
    });
}

function show(data) {
    document.getElementById('resultKaryawan').setAttribute('value',data[0].rfid_uid);
  }