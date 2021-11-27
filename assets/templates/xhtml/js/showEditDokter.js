$(document).ready(function () {
    $(".openmodaleditdokter").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditDokter.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditDokter").html(ajaxData);
                      $("#modalEditDokter").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });