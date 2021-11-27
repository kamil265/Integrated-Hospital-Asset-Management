		$(document).ready(function() {

			$("#btnGetUidPasien").click(function() {
			getPasienUID();
			});

		});

		//Method 1
		function getPasienUID()
		{
			jQuery.ajax({
			url: "getUidPasien.php",
			dataType:'json',
			success:function(response)
			{
                show(response);
			}
			});
		}

        function show(data) {
            document.getElementById('resultPasien').setAttribute('value',data[0].rfid_uid);
          }