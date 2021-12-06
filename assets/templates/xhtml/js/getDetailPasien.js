$('.dtl-pasien').on('click', function() {
    var $valPj = $('#get_uidPasien').html();
    $.ajax({  
        url:"detailPasien.php",  
        method:"POST",  
        data:{valPj:$valPj},  
        success:function(data)  
        {  
             $('#showDetailPasien').fadeIn();  
             $('#showDetailPasien').html(data);  
        }  
   });  
});     