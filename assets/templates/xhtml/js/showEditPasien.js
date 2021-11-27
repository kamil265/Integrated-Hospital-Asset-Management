$(document).ready(function () {
    $(".openmodaleditpasien").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditPasien.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditPasien").html(ajaxData);
                      $("#modalEditPasien").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });