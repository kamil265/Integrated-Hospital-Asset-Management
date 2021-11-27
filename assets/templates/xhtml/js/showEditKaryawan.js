$(document).ready(function () {
    $(".openmodaleditkaryawan").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditKaryawan.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditKaryawan").html(ajaxData);
                      $("#modalEditKaryawan").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });