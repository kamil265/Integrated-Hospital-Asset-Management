$(document).ready(function () {
    $(".openmodaleditpinjam").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalUpdatePeminjaman.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditPeminjaman").html(ajaxData);
                      $("#modalEditPeminjaman").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });