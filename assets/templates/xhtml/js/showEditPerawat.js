$(document).ready(function () {
    $(".openmodaleditperawat").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditPerawat.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditPerawat").html(ajaxData);
                      $("#modalEditPerawat").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });