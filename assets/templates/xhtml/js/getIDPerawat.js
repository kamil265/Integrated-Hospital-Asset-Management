$(document).ready(function() {
    $("#btnGetUidPerawat").click(function() {
    getPerawatUID();
    });
});

//Method 1
function getPerawat()
{
    jQuery.ajax({
    url: "getPerawat.php",
    dataType:'json',
    success:function(response)
    {
        show(response);
    }
    });
}

function show(data) {
    document.getElementById('resultPerawat').setAttribute('value',data[0].rfid_uid);
  }