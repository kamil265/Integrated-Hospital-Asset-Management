$(document).ready(function () {
    $(".openmodaleditclinicalpasien").click(function(e) {
       var m = $(this).attr("id");
            $.ajax({
                    url: "modalEditClinicalPasien.php",
                    type: "GET",
                    data : {id: m,},
                    success: function (ajaxData){
                      $("#modalEditClinicalPasien").html(ajaxData);
                      $("#modalEditClinicalPasien").modal('show',{backdrop: 'true'});
                  }
                });
         });
       });