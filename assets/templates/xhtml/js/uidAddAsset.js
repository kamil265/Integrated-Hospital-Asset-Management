    $( "#removeButton" ).click(function() {
        jQuery.ajax({
            url: "getUID.php",
            dataType:'json',
            success:function(response)
            {
                pjUID(response);
            }
            });
    });
    
    function pjUID(data) {
        $("#get_uidPj").html(data[0].rfid_uid);
      }

    $( "#addButton" ).click(function() {
        jQuery.ajax({
            url: "getUID.php",
            dataType:'json',
            success:function(response)
            {
                uidPinjam(response);
            }
            });
    });
    function uidPinjam(data) {
        $("#get_uidPinjam").html(data[0].rfid_uid);
      }