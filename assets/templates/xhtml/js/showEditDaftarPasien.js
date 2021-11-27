$(document).ready(function () {
    $(".openmodaleditdaftarpasien").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditDaftarPasien.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditDaftarPasien").html(ajaxData);
                      $("#modalEditDaftarPasien").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });