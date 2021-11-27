$(document).ready(function () {
    $(".openmodaleditjumlahperalatan").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditJumlahPeralatan.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditJumlahPeralatan").html(ajaxData);
                      $("#modalEditJumlahPeralatan").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });