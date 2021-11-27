$(document).ready(function () {
    $(".openmodaleditreservasikamar").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditReservasiKamar.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditReservasiKamar").html(ajaxData);
                      $("#modalEditReservasiKamar").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });