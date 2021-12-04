$(document).ready(function () {
  $(".openmodaleditjadwalkaryawan").click(function(e) {
     var m = $(this).attr("id");
          $.ajax({
                  url: "modalEditJadwalKaryawan.php",
                  type: "GET",
                  data : {id: m,},
                  success: function (ajaxData){
                    $("#modalEditJadwalKaryawan").html(ajaxData);
                    $("#modalEditJadwalKaryawan").modal('show',{backdrop: 'true'});
                }
              });
       });
     });