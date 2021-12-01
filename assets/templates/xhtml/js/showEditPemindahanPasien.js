$(document).ready(function () {
    $(".openmodaleditpemindahanpasien").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditPemindahanPasien.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditPemindahanPasien").html(ajaxData);
                      $("#modalEditPemindahanPasien").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });