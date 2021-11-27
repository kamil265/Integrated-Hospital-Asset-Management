$(document).ready(function () {
    $(".openmodaleditasset").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditAsset.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditAsset").html(ajaxData);
                      $("#modalEditAsset").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });