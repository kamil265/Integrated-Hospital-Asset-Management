$('.dtl-pj').on('click', function() {
    var $valPj = $('#get_uidPj').html();
    $.ajax({  
        url:"detailPenanggungJawab.php",  
        method:"POST",  
        data:{valPj:$valPj},  
        success:function(data)  
        {  
             $('#showDetailPj').fadeIn();  
             $('#showDetailPj').html(data);  
        }  
   });  
});     