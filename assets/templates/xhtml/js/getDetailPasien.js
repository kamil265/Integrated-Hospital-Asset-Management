$('.dtl-pasien').on('click', function() {
    var $valPasien = $('#get_uidPas').html();
    $.ajax({  
        url:"detailPasien.php",  
        method:"POST",  
        data:{valPasien:$valPasien},  
        success:function(data)  
        {  
             $('#showDetailPasien, #showDetailPasien2').fadeIn();  
             $('#showDetailPasien, #showDetailPasien2').html(data);  
        }  
   });  
});     