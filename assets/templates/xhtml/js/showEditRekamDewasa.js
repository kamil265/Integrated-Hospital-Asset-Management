$(document).ready(function () {
    $(".openmodaleditrekamdewasa").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditRekamDewasa.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditRekamDewasa").html(ajaxData);
                      $("#modalEditRekamDewasa").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });