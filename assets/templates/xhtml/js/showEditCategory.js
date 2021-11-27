$(document).ready(function () {
    $(".openmodaleditcat").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditCategory.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditCategory").html(ajaxData);
                      $("#modalEditCategory").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });