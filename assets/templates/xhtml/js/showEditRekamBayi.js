$(document).ready(function () {
    $(".openmodaleditrekambayi").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditRekamBayi.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditRekamBayi").html(ajaxData);
                      $("#modalEditRekamBayi").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });