$(document).ready(function () {
    $(".openmodaleditjadwal").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditJadwal.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditJadwal").html(ajaxData);
                      $("#modalEditJadwal").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });