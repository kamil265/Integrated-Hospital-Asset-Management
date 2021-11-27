$(document).ready(function () {
    $(".openmodaleditrekamanak").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditRekamAnak.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditRekamAnak").html(ajaxData);
                      $("#modalEditRekamAnak").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });