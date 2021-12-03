$(document).ready(function () {
  $(".openmodaleditjadwalperawat").click(function(e) {
     var m = $(this).attr("id");
          $.ajax({
                  url: "modalEditJadwalPerawat.php",
                  type: "GET",
                  data : {id: m,},
                  success: function (ajaxData){
                    $("#modalEditJadwalPerawat").html(ajaxData);
                    $("#modalEditJadwalPerawat").modal('show',{backdrop: 'true'});
                }
              });
       });
     });